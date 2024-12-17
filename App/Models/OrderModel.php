<?php

namespace App\Models;

class OrderModel extends BaseModel
{
    public function createOrder()
    {
        // var_dump($_POST);
        // exit;
        try {
            $sqlOrder = "INSERT INTO `orders`(`id_user`, `sub_address`, `sub_tel`, `sub_name`, `email`,`total`, `payment_method`) 
            VALUES (?, ?, ?,?, ?, ?, ?);";

            $conn = $this->_conn->MySQLi(); // Kết nối database
            $stmtOrder = $conn->prepare($sqlOrder);

            if (!$stmtOrder) {
                error_log('Lỗi chuẩn bị truy vấn orders: ' . $conn->error);
                return null;
            }

            // Lấy dữ liệu từ POST hoặc cookie
            $idUser = isset($_POST['id_user']) ? (int)$_POST['id_user'] : 0;
            $subAddress = $_POST['address'] ?? '';
            $subTel = $_POST['sub_tel'] ?? '';
            $subName = $_POST['sub_name'] ?? $_COOKIE['name_user'];
            $email = $_POST['email'] ?? '';
            $total = $_POST['amount'];
            $paymentMethod = $_POST['bank_code'] ?? '';

            // Gắn dữ liệu vào câu lệnh SQL cho bảng `orders`
            $stmtOrder->bind_param("issssis", $idUser, $subAddress, $subTel, $subName, $email, $total, $paymentMethod);

            // Thực thi câu lệnh SQL cho bảng `orders`
            if ($stmtOrder->execute()) {
                $newOrderId = $conn->insert_id;

                // Lấy giỏ hàng từ cookie
                $cart = isset($_COOKIE['carts_detail']) ? json_decode($_COOKIE['carts_detail'], true) : [];

                if (!empty($cart)) {
                    $sqlOrderDetail = "INSERT INTO `orders_detail`(`id_order`, `id_product`, `quantity`, `price`) 
                    VALUES (?, ?, ?, ?);";

                    $stmtDetail = $conn->prepare($sqlOrderDetail);

                    if (!$stmtDetail) {
                        error_log('Lỗi chuẩn bị truy vấn orders_detail: ' . $conn->error);
                        return null;
                    }

                    foreach ($cart as $productId => $quantity) {
                        // Giả sử bạn đã lấy giá sản phẩm từ database (cần truy vấn giá trị tương ứng)
                        $price = $this->getProductPrice($productId);

                        $stmtDetail->bind_param("iiii", $newOrderId, $productId, $quantity, $price);

                        if (!$stmtDetail->execute()) {
                            error_log('Lỗi thêm chi tiết đơn hàng: ' . $stmtDetail->error);
                            return null;
                        }
                    }
                }

                return $newOrderId; // Trả về mã đơn hàng vừa tạo
            } else {
                error_log('Lỗi tạo đơn hàng: ' . $stmtOrder->error);
                return null;
            }
        } catch (\Throwable $th) {
            error_log('Lỗi ngoại lệ tại createOrder: ' . $th->getMessage() . ' | File: ' . $th->getFile() . ' | Line: ' . $th->getLine());
            return null;
        }
    }

    private function getProductPrice($productId)
    {
        // Hàm truy vấn giá sản phẩm từ database
        $sql = "SELECT price FROM product_variants WHERE id_product = ?";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['price'];
        }

        return 0; // Trả về giá mặc định nếu không tìm thấy
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
    //  Lấy toàn bộ danh sách đơn hàng
    public function getAllOrders(){
        try {
            $sql = "SELECT orders.*, users.name as user_name
             FROM orders Join users on orders.id_user = users.id
            ";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $orders = [];
            while($row = $result->fetch_assoc()){
                $orders[] = $row;
            }
            return $orders;
        } catch (\Throwable $th) {
            error_log('Loi ngoại lệ tại getAllOrders: '. $th->getMessage().'| File: '. $th->getFile().'| Line: '. $th->getLine());
            return null;
        }
    }
    
   // Lấy chi tiết đơn hàng
   public function getOrderDetail($id)
   {
       $sql = "SELECT orders.*, orders_detail.price AS orders_detail_price, products.name AS products_name, orders_detail.quantity  
               FROM orders
               JOIN orders_detail ON orders.id = orders_detail.id_order
               JOIN products ON orders_detail.id_product = products.id
               WHERE orders.id = ? ORDER BY id DESC";
       $conn = $this->_conn->MySQLi(); // Kết nối MySQLi
       $stmt = $conn->prepare($sql);
       $stmt->bind_param('i', $id);
       $stmt->execute();
       $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
       return $result;
   }
   public function getOneOrderDetail($id)
{
    $sql = "SELECT *
            FROM orders
           
            WHERE orders.id = ?";  
    $conn = $this->_conn->MySQLi(); // Kết nối MySQLi
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();  // Dùng fetch_assoc() thay vì fetch_all() để lấy một kết quả duy nhất
    return $result;
}

    
    
    

    
}
