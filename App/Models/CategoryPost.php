<?php

namespace App\Models;

class CategoryPost extends BaseModel
{
    protected $table = 'categoriesc_post';
    protected $id = 'id';

    public function getAllCategoryPost()
    {
        return $this->getAll();
    }
    public function getOneCategoryPost($id)
    {
        return $this->getOne($id);
    }

    public function createCategoryPost($data)
    {
        return $this->create($data);
    }
    public function updateCategoryPost($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteCategoryPost($id)
    {
        return $this->delete($id);
    }
    public function getAllCategoryPostByStatus()
    {
        return $this->getAllByStatus();
    }
    

    public function getOneCategoryPostByName($name)
    {
        return $this->getOneByName($name);
    }

    public function countTotalPostCategory(){
        return $this->countTotal();
    }
}
