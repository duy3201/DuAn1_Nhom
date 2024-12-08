<?php

namespace App\Models;

use App\Helpers\NotificationHelper;

class User extends BaseModel
{
    protected $table = 'users';
    protected $id = 'id';

    public function getAllUser()
    {
        return $this->getAll();
    }
    public function getOneUser($id)
    {
        return $this->getOne($id);
    }

    public function createUser($data)
    {
        return $this->create($data);
    }
    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }
    public function getAllUserByStatus()
    {
        return $this->getAllByStatus();
    }

    public function getOneUserByUsername(string $username)
    {
        $result = [];
        try {
            $sql = "SELECT * FROM users WHERE username=?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);
            

            $stmt->bind_param('s', $username);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function updateUserByUsernameAndEmail( array $data)
    {
        try {
            $username = $data['username'];
            $email = $data['email'];
            $password = $data['password'];
            $adderss = $data['adderss'];
            $date_of_birth = $data['date_of_birth'];
            $sql = "UPDATE $this->table SET password = '$password' WHERE username = '$username' AND email = '$email'" ;

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->execute();

            return $stmt->affected_rows;
        } catch (\Throwable $th) {
            error_log('Lỗi khi cập nhật dữ liệu: ', $th->getMessage());
            NotificationHelper::error('updateUserByUsernameAndEmail', 'Lỗi khi thực hiện cập nhật dữ liệu');
            return false;
        }
    }

    public function countTotalUser(){
        return $this->countTotal();
    }
    public function getUserTransactions($user_id)
{
    $result = [];
    try {
        // Câu lệnh SQL để lấy giao dịch của người dùng đăng nhập
        $sql = "SELECT orders.*, orders_detail.price AS orders_detail_price, products.name AS products_name  
         FROM orders
         JOIN orders_detail ON orders.id = orders_detail.id_order
        JOIN products ON orders_detail.id_product = products.id
        WHERE orders.id_user = ? ORDER BY id DESC";
        $conn = $this->_conn->MySQLi(); // Kết nối MySQLi
        $stmt = $conn->prepare($sql);

        // Ràng buộc tham số
        $stmt->bind_param('i', $user_id);

        // Thực thi truy vấn
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // Lấy kết quả dưới dạng mảng liên kết
    } catch (\Throwable $th) {
        // Ghi log lỗi nếu xảy ra lỗi
        error_log('Lỗi khi lấy giao dịch người dùng: ' . $th->getMessage());
    }
    return $result;
}

}
