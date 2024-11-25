<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
    public static function render($data = null)
    {

        // Hiển thị thông báo thành công với SweetAlert2
        if (isset($_SESSION['success'])):
            foreach ($_SESSION['success'] as $key => $value):
?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        title: "<?= $value ?>",
                       div:"<?= $value ?>", // Nội dung thông báo
                        icon: "success", // Biểu tượng thông báo
                        confirmButtonText: "OK", // Văn bản của nút
                        customClass: {
                            confirmButton: 'swal2-warning-btn' // Lớp tùy chỉnh cho nút OK
                        }
                    });
                </script>
                <style>
                    .swal2-warning-btn {
                        background-color: #ffc107 !important;
                        /* Màu vàng warning */
                        color: #fff !important;
                        /* Chữ trắng */
                    }

                    .swal2-warning-btn:hover {
                        background-color: #e0a800 !important;
                        /* Màu vàng đậm hơn khi hover */
                    }
                </style>
            <?php
            endforeach;
        endif;


        if (isset($_SESSION['error'])):
            ?>
            <!-- Chèn CSS và JS của Bootstrap -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

            <?php foreach ($_SESSION['error'] as $value): ?>

                

            <?php endforeach; ?>
            </div>
<?php
            unset($_SESSION['error']);
        endif;
    }
}
?>