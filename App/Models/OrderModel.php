<?php

namespace App\Models;

class OrderModel extends BaseModel
{
    public function createOrder($orderId)
    {
        try {
            // Câu lệnh SQL INSERT (bỏ cột `id` nếu là auto-increment)
            $sql = "INSERT INTO `orders`(`id_user`, `sub_address`, `sub_tel`, `sub_name`, `email`, `payment_method`) 
                VALUES (?, ?, ?, ?, ?, ?);";

            $conn = $this->_conn->MySQLi(); // Kết nối database
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                error_log('Lỗi chuẩn bị truy vấn: ' . $conn->error);
                return null;
            }

            // Kiểm tra và cung cấp giá trị mặc định cho các tham số
            $idUser = isset($_POST['id_user']) ? (int)$_POST['id_user'] : 0;
            $subAddress = $_POST['address'] ?? '';
            $subTel = $_POST['sub_tel'] ?? '';
            $subName = $_POST['sub_name'] ?? '';
            $email = $_POST['email'] ?? '';
            $bankCode = $_POST['bank_code'] ?? '';

            // Gắn dữ liệu vào câu lệnh SQL
            $stmt->bind_param("isssss", $idUser, $subAddress, $subTel, $subName, $email, $bankCode);

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
