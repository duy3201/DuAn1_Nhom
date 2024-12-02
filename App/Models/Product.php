<?php

namespace App\Models;

class Product extends BaseModel
{
    protected $table = 'products';
    protected $id = 'id';

    public function getAllProduct()
    {
        return $this->getAll();
    }
    public function getOneProduct($id)
    {
        return $this->getOne($id);
    }

    public function createProduct($data)
    {
        return $this->create($data);
    }
    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
    // public function getAllProductByStatus()
    // {
    //     $result = [];
    //     try {
    //         $sql = "SELECT products.* FROM products 
    //     INNER JOIN categories ON products.id_category = categories.id 
    //     WHERE products.status = " . self::STATUS_ENABLE . " 
    //     AND categories.status = " . self::STATUS_ENABLE;
    //         $result = $this->_conn->MySQLi()->query($sql);
    //         return $result->fetch_all(MYSQLI_ASSOC);
    //     } catch (\Throwable $th) {
    //         error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
    //         return $result;
    //     }
    // }

    public function getAllProductByStatus()
    {
        $result = [];
        try {
            $sql = "
            SELECT 
                products.*, 
                MAX(product_variants.quality) AS quality, 
                MIN(product_variants.price) AS price
            FROM 
                products 
            INNER JOIN 
                categories ON products.id_category = categories.id 
            INNER JOIN 
                product_variants ON products.id = product_variants.id_product
            WHERE 
                products.status = " . self::STATUS_ENABLE . " 
            AND 
                categories.status = " . self::STATUS_ENABLE . "
            GROUP BY 
                products.id";

            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllProductByIsfeature()
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.name AS category_name, product_variants.quality as product_quality, 
            product_variants.price as product_price
        FROM products 
        INNER JOIN categories ON products.id_category = categories.id 
        INNER JOIN 
            product_variants ON products.id = product_variants.id_product
        WHERE products.is_featured =1;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }





    public function getOneProductByName($name)
    {
        return $this->getOneByName($name);
    }

    public function getAllProductJoinCategory()
    {
        $result = [];
        try {
            // $sql = "SELECT * FROM $this->table";
            $sql = "SELECT 
    products.*, 
    categories.name AS category_name, 
    users.name AS user_name,
    product_variants.*  -- Hoặc chỉ các trường bạn cần từ bảng product_variants
FROM 
    products
INNER JOIN categories
    ON products.id_category = categories.id
INNER JOIN users
    ON products.id_user = users.id
INNER JOIN product_variants
    ON products.id = product_variants.id_product;
";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllProductByCategoryAndStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT products.*, categories.name AS category_name,  product_variants.quality as product_quality, 
            product_variants.price as product_price 
                FROM products 
                INNER JOIN categories ON products.id_category = categories.id 
                 INNER JOIN 
            product_variants ON products.id = product_variants.id_product
                WHERE products.status = " . self::STATUS_ENABLE . " 
                AND categories.status = " . self::STATUS_ENABLE . " AND products.id_category = ?";

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

    public function getOneProductByStatus(int $id)
    {
        $result = [];
        try {
            $sql = "
             SELECT 
            products.*, 
            product_variants.quality as product_quality,
            product_variants.quanlity as product_quanlity, 
            product_variants.price as product_price,
            categories.name AS category_name
                FROM 
            products 
        INNER JOIN 
            categories ON products.id_category = categories.id 
        INNER JOIN 
            product_variants ON products.id = product_variants.id_product
                WHERE products.status = " . self::STATUS_ENABLE . " 
                AND categories.status = " . self::STATUS_ENABLE . " AND products.id = ?";
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
    public function getOneProductByQuality(int $id)
    {
        $result = [];
        try {
            $sql = "
             SELECT product_variants.quality as product_quality,
              product_variants.price AS product_price
                FROM 
            products 
        INNER JOIN 
            product_variants ON products.id = product_variants.id_product
                WHERE products.id = ? ";
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

    public function getAllProductByVariant()
    {
        $result = [];
        try {
            $sql = "
             SELECT 
            products.*, 
            product_variants.quality as product_quality,
            product_variants.quanlity as product_quanlity, 
            product_variants.price as product_price,
            categories.name AS category_name
                FROM 
            products 
        INNER JOIN 
            categories ON products.id_category = categories.id 
        INNER JOIN 
            product_variants ON products.id = product_variants.id_product;
            ";
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

    public function countTotalProduct()
    {
        return $this->countTotal();
    }

    public function countProductByCategory()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) AS count,categories.name 
            FROM products 
            INNER JOIN categories ON products.id_category = categories.id 
            GROUP BY products.id_category;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    // public function deleteCommentsByProductId(int $productId)
    // {
    //     $conn = $this->_conn->MySQLi();

    //     $sql = "DELETE FROM products WHERE product_id = ?";
    //     if ($stmt = $conn->prepare($sql)) {
    //         $stmt->bind_param('i', $productId);
    //         $result = $stmt->execute();
    //         $stmt->close();
    //         return $result;
    //     } else {
    //         error_log('Lỗi khi chuẩn bị truy vấn: ' . $conn->error);
    //         return false;
    //     }
    // }

}
