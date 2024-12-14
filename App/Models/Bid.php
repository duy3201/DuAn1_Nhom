<?php

namespace App\Models;

class Bid extends BaseModel
{
    protected $table = 'Bids';
    protected $id = 'id';

    public function getAllBid()
    {
        return $this->getAll();
    }

    public function getOneBid($id)
    {
        return $this->getOne($id);
    }

    public function createBid($data)
{
    $result = [];
    try {
        // Lấy user_id từ cookie nếu không có trong dữ liệu
        $user_id = isset($_COOKIE['id_user']) ? $_COOKIE['id_user'] : null;
        // Chuẩn bị câu lệnh SQL
        $sql = "INSERT INTO `bids`(`user_id`, `auction_id`, `bid_amount`, `created_at`) VALUES (?, ?, ?, ?)";
        $conn = $this->_conn->MySQLi();
        $stmt = $conn->prepare($sql);

        // Lấy các giá trị từ dữ liệu đầu vào
        $auction_id = $data['auction_id'];
        $bid_amount = $data['bid_amount'];
        $created_at = $data['created_at'];

        // Giới thiệu tham số cho câu lệnh SQL
        $stmt->bind_param('iiis', $user_id, $auction_id, $bid_amount, $created_at);

        // Thực thi câu lệnh SQL
        $stmt->execute();

        // Kiểm tra xem có bị lỗi không
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    } catch (\Throwable $th) {
        error_log('Lỗi khi tạo đấu giá: ' . $th->getMessage());
        return false;
    }
}


    public function updateBid($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBid($id)
    {
        return $this->delete($id);
    }

}
