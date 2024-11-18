<?php

namespace App\Models;

class Post extends BaseModel
{
    protected $table = 'posts';
    protected $id = 'id';

    public function getAllPost()
    {
        return $this->getAll();
    }
    public function getOnePost($id)
    {
        return $this->getOne($id);
    }

    public function createPost($data)
    {
        return $this->create($data);
    }
    public function updatePost($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletePost($id)
    {
        return $this->delete($id);
    }
    public function getAllPostByStatus()
    {
        $result = [];
        try {
            $sql = "SELECT posts.* FROM posts 
        INNER JOIN posts ON posts.id_categories_post = categories_post.id 
        WHERE post.status = " . self::STATUS_ENABLE . " 
        AND categories_posts.status = " . self::STATUS_ENABLE;
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }



    public function getOnePostByName($name)
    {
        return $this->getOneByName($name);
    }
    public function getOnePostByTitle($title)
    {
        return $this->getOneByTitle($title);
    }

    public function getAllPostJoinCategoryPost()
    {
        $result = [];
        try {
            // $sql = "SELECT * FROM $this->table";
            $sql = "SELECT 
    posts.*, categories_post.name AS categories_post_name
FROM 
    posts
INNER JOIN 
    categories_post 
ON 
    posts.id_categories_post = categories_post.id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllPostByCategoryAndStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT posts.*, categories_post.name AS categories_post_name 
                FROM products 
                INNER JOIN categories_post ON post.id_categories_post = categories_post.id 
                WHERE products.status = " . self::STATUS_ENABLE . " 
                AND categories_post.status = " . self::STATUS_ENABLE . " AND post.id_categories_post = ?";

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

    public function getOnePostByStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT posts.*, categories_post.name AS categories_post_name 
                FROM posts 
                INNER JOIN categories_post ON post.id_categories_post = categories_post.id 
                WHERE posts.status = " . self::STATUS_ENABLE . " 
                AND categories_post.status = " . self::STATUS_ENABLE . " AND posts.id = ?";
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

    public function countTotalPost()
    {
        return $this->countTotal();
    }

    public function countPostByCategory()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) AS count, categories_post.name 
            FROM posts 
            INNER JOIN categories_post ON posts.id_categories_post = categories_post.id 
            GROUP BY posts.id_categories_post;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function deleteCommentsByPostId(int $productId)
    {
        $conn = $this->_conn->MySQLi();

        $sql = "DELETE FROM comments WHERE product_id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('i', $productId);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        } else {
            error_log('Lỗi khi chuẩn bị truy vấn: ' . $conn->error);
            return false;
        }
    }
}
