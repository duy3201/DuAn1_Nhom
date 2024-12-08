<?php

namespace App\Views\Admin\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <!-- Tích hợp SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php
        // Hiển thị thông báo thành công
        if (isset($_SESSION['success'])) :
            foreach ($_SESSION['success'] as $key => $value) :
        ?>
                <script>
                    Swal.fire({
                        
                        text: "<?= $value ?>",
                        icon: "success",
                        confirmButtonText: "OK",
                        customClass: {
                            title: 'swal2-custom-title',
                            confirmButton: 'swal2-success-btn'
                        }
                    });
                </script>
                <style>
                    .swal2-success-btn {
                        background-color: #28a745 !important;
                        color: #fff !important;
                    }

                    .swal2-success-btn:hover {
                        background-color: #218838 !important;
                    }

                    /* Đổi màu chữ của title thành đen */
                    .swal2-custom-title {
                        color: #000 !important;
                    }
                </style>
        <?php
            endforeach;
            unset($_SESSION['success']); // Xóa thông báo sau khi hiển thị
        endif;

        // Hiển thị thông báo lỗi
        if (isset($_SESSION['error'])) :
            foreach ($_SESSION['error'] as $key => $value) :
        ?>
                <script>
                    Swal.fire({
                        
                        text: "<?= $value ?>",
                        icon: "error",
                        confirmButtonText: "OK",
                        customClass: {
                            title: 'swal2-custom-title',
                            confirmButton: 'swal2-error-btn'
                           
                        }
                    });
                </script>
                <style>
                    .swal2-error-btn {
                        background-color: #dc3545 !important;
                        color: #fff !important;
                    }

                    .swal2-error-btn:hover {
                        background-color: #c82333 !important;
                    }

                    /* Đổi màu chữ của title thành đen */
                    .swal2-custom-title {
                        color: #000 !important;
                    }
                </style>
        <?php
            endforeach;
            unset($_SESSION['error']); // Xóa thông báo sau khi hiển thị
        endif;
    }
}
