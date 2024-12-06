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
        return $this->create($data);
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

