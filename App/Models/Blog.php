<?php

namespace App\Models;

class Blog extends BaseModel
{
    protected $table = 'posts';
    protected $id = 'id';

    public function getAllBlog()
    {
        return $this->getAll();
    }
    public function getOneBlog($id)
    {
        return $this->getOne($id);
    }

    public function createBlog($data)
    {
        return $this->create($data);
    }
    public function updateBlog($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBlog($id)
    {
        return $this->delete($id);
    }
    // public function getAllProductByStatus()
    // {
    //     $result = [];
    //     try {
    //         $sql = "SELECT posts.* FROM posts 
    //     INNER JOIN categories ON posts.id_category = categories.id 
    //     WHERE posts.status = " . self::STATUS_ENABLE . " 
    //     AND categories.status = " . self::STATUS_ENABLE;
    //         $result = $this->_conn->MySQLi()->query($sql);
    //         return $result->fetch_all(MYSQLI_ASSOC);
    //     } catch (\Throwable $th) {
    //         error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
    //         return $result;
    //     }
    // }

    public function getAllBlogByStatus()
    {
        $result = [];
        try {
            $sql = "
            SELECT 
                posts.*, 
                MAX(product_variants.quality) AS quality, 
                MIN(product_variants.price) AS price
            FROM 
                posts 
            INNER JOIN 
                categories ON posts.id_category = categories.id 
            INNER JOIN 
                product_variants ON posts.id = product_variants.id_product
            WHERE 
                posts.status = " . self::STATUS_ENABLE . " 
            AND 
                categories.status = " . self::STATUS_ENABLE . "
            GROUP BY 
                posts.id";

            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllBlogByIsfeature()
    {
        $result = [];
        try {
            $sql = "SELECT posts.*, categories.name AS category_name, product_variants.quality as product_quality, 
            product_variants.price as product_price
        FROM posts 
        INNER JOIN categories ON posts.id_category = categories.id 
        INNER JOIN 
            product_variants ON posts.id = product_variants.id_product
        WHERE posts.is_featured =1;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }





    public function getOneBlogByName($name)
    {
        return $this->getOneByName($name);
    }

    public function getAllBlogJoinCategory()
    {
        $result = [];
        try {
            $sql = "SELECT 
    posts.*, 
    categories.name AS category_name, 
    users.name AS user_name
FROM 
    posts
INNER JOIN 
    categories 
ON 
    posts.id_category = categories.id
INNER JOIN 
    users
ON 
    posts.id_user = users.id;
";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllBlogStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT posts.*
                
                WHERE posts.status = " . self::STATUS_ENABLE . " 
                AND categories.status = " . self::STATUS_ENABLE . " AND posts.id_category = ?";

            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getOneBlogByStatus(int $id)
    {
        $result = [];
        try {
            $sql = "
             SELECT 
            posts.*, 
            product_variants.quality as product_quality,
            product_variants.quanlity as product_quanlity, 
            product_variants.price as product_price,
            categories.name AS category_name
                FROM 
            posts 
        INNER JOIN 
            categories ON posts.id_category = categories.id 
        INNER JOIN 
            product_variants ON posts.id = product_variants.id_product
                WHERE posts.status = " . self::STATUS_ENABLE . " 
                AND categories.status = " . self::STATUS_ENABLE . " AND posts.id = ?";
            $conn = $this->_conn->MySQLi();
            $stmt = $conn->prepare($sql);

            $stmt->bind_param('i', $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị chi tiết dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }


    public function countTotalProduct()
    {
        return $this->countTotal();
    }

    public function countProductByCategory()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) AS count,categories.name 
            FROM posts 
            INNER JOIN categories ON posts.id_category = categories.id 
            GROUP BY posts.id_category;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

   
}
