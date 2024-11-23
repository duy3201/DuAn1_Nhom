<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
    public static function render($data = null)
    {
        // Hiển thị thông báo thành công với SweetAlert2
        if (isset($_SESSION['success'])):
            foreach ($_SESSION['success'] as $value):
                ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    Swal.fire({
                        title: "<?= $value ?>", // Nội dung thông báo
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

        // Hiển thị thông báo lỗi với Bootstrap Toast
        // Hiển thị thông báo lỗi (nếu có)
        if (isset($_SESSION['error'])):
            ?>
            <!-- Chèn CSS và JS của Bootstrap -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

            <div class="container mt-3">
                <?php foreach ($_SESSION['error'] as $value): ?>
                    <!-- Toast cho từng lỗi -->
                    <div class="toast align-items-center text-bg-danger border-0 mb-2" role="alert" aria-live="assertive"
                        aria-atomic="true" data-bs-autohide="false">
                        <div class="d-flex">
                            <div class="toast-body">
                                <?= $value ?>
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>

                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            unset($_SESSION['error']); // Xóa thông báo lỗi sau khi hiển thị
        endif;
    }
}
?>

<!-- Khởi tạo tất cả các Toast -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastElements = document.querySelectorAll('.toast');
        toastElements.forEach(function (toastEl) {
            var toast = new bootstrap.Toast(toastEl);
            toast.show(); // Hiển thị toast khi trang được tải
        });
    });
</script>