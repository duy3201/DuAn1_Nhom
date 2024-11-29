<?php

namespace App\Models;

class Auction extends BaseModel
{
    protected $table = 'auctions';
    protected $id = 'id';

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

            $sqlOpen = "UPDATE $this->table 
                        SET status = ? 
                        WHERE start_time <= NOW() AND end_time > NOW() AND status = ?";
            $stmtOpen = $conn->prepare($sqlOpen);
            if (!$stmtOpen) {
                throw new \Exception('SQL prepare failed for opening auction.');
            }
            $statusOpen = self::STATUS_OPEN;
            $statusClosed = self::STATUS_CLOSED;
            $stmtOpen->bind_param('ii', $statusOpen, $statusClosed);
            $stmtOpen->execute();

            $sqlClose = "UPDATE $this->table 
                         SET status = ? 
                         WHERE end_time <= NOW() AND status = ?";
            $stmtClose = $conn->prepare($sqlClose);
            if (!$stmtClose) {
                throw new \Exception('SQL prepare failed for closing auction.');
            }
            $statusEnded = self::STATUS_ENDED;
            $stmtClose->bind_param('ii', $statusEnded, $statusOpen);
            $stmtClose->execute();

            return true;
        } catch (\Throwable $th) {
            error_log('Error updating auction status: ' . $th->getMessage());
            return false;
        }
    }

    public function getAuctionWithProductName($id)
    {
        try {
            $conn = $this->_conn->MySQLi();

            $sql = "SELECT auctions.*, products.name AS product_name 
FROM $this->table
JOIN products ON auctions.product_id = products.id 
WHERE auctions.id = ?";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new \Exception('SQL prepare failed for fetching auction with product name.');
            }

            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Error fetching auction with product name: ' . $th->getMessage());
            return false;
        }
    }
}
?>
