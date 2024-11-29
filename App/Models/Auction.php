<?php

namespace App\Models;

class Auction extends BaseModel
{
    protected $table = 'auctions';
    protected $id = 'id';

    // Các trạng thái đấu giá
    const STATUS_CLOSED = 0;   // Chưa bắt đầu
    const STATUS_OPEN = 1;     // Đã mở
    const STATUS_ENDED = 2;    // Đã kết thúc

    public function getAllAuction()
    {
        return $this->getAll();
    }

    public function getOneAuction($id)
    {
        return $this->getOne($id);
    }

    public function createAuction($data)
    {
        return $this->create($data);
    }

    public function updateAuction($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteAuction($id)
    {
        return $this->delete($id);
    }

    public function updateAuctionStatus()
{
    try {
        $conn = $this->_conn->MySQLi();
        
        if (!$conn) {
            throw new \Exception('Database connection not established.');
        }

        // Cập nhật đấu giá từ "Đóng" sang "Đã Mở" nếu thời gian bắt đầu <= NOW và thời gian kết thúc > NOW
        $sqlOpen = "UPDATE $this->table 
                    SET status = ? 
                    WHERE start_time <= NOW() AND end_time > NOW() AND status = ?";
        $stmtOpen = $conn->prepare($sqlOpen);
        $statusOpen = self::STATUS_OPEN;
        $statusClosed = self::STATUS_CLOSED;
        $stmtOpen->bind_param('ii', $statusOpen, $statusClosed);
        $stmtOpen->execute();

        // Cập nhật đấu giá từ "Đã Mở" sang "Kết Thúc" nếu thời gian kết thúc <= NOW
        $sqlClose = "UPDATE $this->table 
                     SET status = ? 
                     WHERE end_time <= NOW() AND status = ?";
        $stmtClose = $conn->prepare($sqlClose);
        $statusEnded = self::STATUS_ENDED;
        $stmtClose->bind_param('ii', $statusEnded, $statusOpen);
        $stmtClose->execute();

        return true;
    } catch (\Throwable $th) {
        error_log('Error updating auction status: ' . $th->getMessage());
        return false;
    }
}

}
?>
