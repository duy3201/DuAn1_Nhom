<?php


namespace App\Validations;

use App\Helpers\NotificationHelper;

class ProductVariantValidation {
    public static function create() : bool {
        $is_valid = true;

        //Tên loại
        if (!isset($_POST['name']) || $_POST['name'] === '') {
            NotificationHelper::error('name', 'Không để trống tên biến thể');
            $is_valid = false;
        }

        //id biến thể
        if (!isset($_POST['id_product']) || $_POST['id_product'] === '') {
            NotificationHelper::error('id_product', 'Không để trống loại biến thể');
            $is_valid = false;
        }

        return $is_valid;
    }

    public static function edit() : bool {
        return self::create();
    }
}

