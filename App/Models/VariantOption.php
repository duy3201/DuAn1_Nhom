<?php

namespace App\Models;

class Variantoption extends BaseModel
{
    protected $table = 'product_variant_options';
    protected $id = 'id';

    public function getAllProductVariantOption()
    {
        return $this->getAll();
    }

    public function getOneProductVariantOption($id)
    {
        return $this->getOne($id);
    }

    public function createProductVariantOption($data)
    {
        return $this->create($data);
    }

    public function updateProductVariantOption($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteProductVariantOption($id)
    {
        return $this->delete($id);
    }

    public function getOneProductVariantOptionByName($name)
    {
        return $this->getOneByName($name);
    }

    public function getAllProductVariantOptionJoinProduct()
    {
        $result = [];
        try {
            $sql = "SELECT 
                        product_variants.*, 
                        products.id AS id_product
                    FROM 
                        product_variants
                    INNER JOIN
                        products 
                    ON 
                        product_variants.id_product = products.id";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị tất cả dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function getAllProductVariantOptionByProductAndStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT 
                        product_variants.*, 
                        products.id AS id_product
                    FROM 
                        product_variants
                    INNER JOIN
                        products 
                    ON 
                        product_variants.id_product = products.id
                    WHERE 
                        product_variants.status = " . self::STATUS_ENABLE . " 
                    AND 
                        product_variants.id_product = ?";
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

    public function getOneProductVariantOptionByStatus(int $id)
    {
        $result = [];
        try {
            $sql = "SELECT 
                        product_variants.*, 
                        products.id AS id_product
                    FROM 
                        product_variants
                    INNER JOIN
                        products 
                    ON 
                        product_variants.id_product = products.id
                    WHERE 
                        product_variants.status = " . self::STATUS_ENABLE . " 
                    AND 
                        product_variants.id = ?";
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

    public function countTotalProductVariantOption()
    {
        return $this->countTotal();
    }

    public function countProductVariantOptionByProduct()
    {
        $result = [];
        try {
            $sql = "SELECT COUNT(*) AS count, products.id AS id_product 
                    FROM product_variants 
                    INNER JOIN products ON product_variants.id_product = products.id
                    GROUP BY product_variants.id_product;";
            $result = $this->_conn->MySQLi()->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (\Throwable $th) {
            error_log('Lỗi khi hiển thị dữ liệu: ' . $th->getMessage());
            return $result;
        }
    }

    public function deleteCommentsByProductVariantOptionId(int $ProductVariantId)
    {
        $conn = $this->_conn->MySQLi();
        $sql = "DELETE FROM comments WHERE ProductVariant_id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('i', $ProductVariantId);
            $result = $stmt->execute();
            $stmt->close();
            return $result;
        } else {
            error_log('Lỗi khi chuẩn bị truy vấn: ' . $conn->error);
            return false;
        }
    }
}
