<?php

namespace App\Models;

class OrderModel extends BaseModel
{
    public function createOrder($orderId)
    {
        var_dump($_POST['orderId']);
        exit;
        // Nối các giá trị địa chỉ thành một trường duy nhất
        $fullAddress = implode(', ', array_filter([
            $_POST['address'] ?? '',
            $_POST['ward'] ?? '',
            $_POST['district'] ?? '',
            $_POST['city'] ?? '',
        ]));

        try {
            // Tạo câu lệnh SQL INSERT
            $sql = "INSERT INTO orders (id_user,id_order, ,sub_tel, sub_name, sub_address, email, payment_method) 
                    VALUES (:id_user,:id_order, ':sub_tel', ':sub_name', ':sub_address', ':email', ':bank_code')";
            
            $conn = $this->_conn->MySQLi(); // Kết nối database
            $stmt = $conn->prepare($sql);

            // Gắn dữ liệu vào câu lệnh SQL
            $stmt->bind_param(
                "iissssss",
                (int)$_POST['id_user'],
                (int)$_POST['orderId'],
                $_POST['sub_tel'],
                $_POST['sub_name'],
                $fullAddress,
                $_POST['email'],
                $_POST['bank_code']
            );

            // Thực thi câu lệnh SQL
            if ($stmt->execute()) {
                // Lấy mã đơn hàng vừa được tạo (insert_id)
                return $conn->insert_id;
            } else {
                // Ghi log lỗi nếu truy vấn thất bại
                error_log('Lỗi tạo đơn hàng: ' . $stmt->error);
                return null;
            }
        } catch (\Throwable $th) {
            // Ghi log nếu có ngoại lệ xảy ra
            error_log('Lỗi ngoại lệ tại createOrder: ' . $th->getMessage() . ' | File: ' . $th->getFile() . ' | Line: ' . $th->getLine());
            return null;
        }
    }
    // Hàm lấy thông tin đơn hàng theo order_id
    public function getOrderId($orderId)
    {
        try {
            // Tạo câu lệnh SQL SELECT
            $sql = "SELECT id_order FROM orders WHERE id_order = :id_order LIMIT 1";
            
            $conn = $this->_conn->MySQLi(); // Kết nối database
            $stmt = $conn->prepare($sql);
            
            // Gắn tham số vào câu lệnh SQL
            $stmt->bind_param("i", $orderId);
            
            // Thực thi câu lệnh SQL
            $stmt->execute();
            $result = $stmt->get_result();

            // Kiểm tra kết quả và trả về id_order nếu có
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['id_order']; // Trả về id_order
            } else {
                return null; // Nếu không tìm thấy đơn hàng
            }
        } catch (\Throwable $th) {
            // Ghi log nếu có ngoại lệ xảy ra
            error_log('Lỗi ngoại lệ tại getOrderId: ' . $th->getMessage() . ' | File: ' . $th->getFile() . ' | Line: ' . $th->getLine());
            return null;
        }
    }
}
