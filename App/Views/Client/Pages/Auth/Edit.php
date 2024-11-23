<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Edit extends BaseView
{
    public static function render($data = null)
    {
?>
        <div class="container mt-5">
            <div class="row">
                <div class="offset-md-1 col-md-3">
                    <?php
                    if ($data && $data['avatar']):
                    ?>
                        <img src="<?= APP_URL ?>/public/assets/client/img/<?= $data['avatar'] ?>" alt="" width="100%">
                    <?php
                    else:
                    ?>
                        <img src="<?= APP_URL ?>/public/assets/client/img/user1.jpeg" alt="" width="100%">
                    <?php
                    endif;
                    ?>
                </div>
                <div class="col-md-7">
                    <div class="card card-body shadow">
                        <h4 class="text-center ">Thông tin Tài khoản</h4>
                        <form action="/users/<?= $data['id'] ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                            <input type="hidden" name="method" value="PUT">
                            <div class="form-group">
                                <label for="username" class="form-label">Tên đăng nhập*</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" value="<?= $data['username'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email*</label>
                                <input type="email" name="email" id="email" class="form-control mb-3" placeholder="Nhập email" value="<?= $data['email'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="name" class="form-label">Họ và tên*</label>
                                <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Nhập họ và tên" value="<?= $data['name'] ?>" required>
                            </div>
                            <div class="group-input mb-3">
                                <label for="tel">Số điện thoại *</label>
                                <input type="tel" name="tel" id="tel" class="form-control mb-3" placeholder="Nhập số điện thoại" value="<?= $data['tel'] ?? '' ?>">
                                <span style="display: none;" id="tel-error" class="text-danger">Vui lòng nhập số điện thoại hợp lệ (10-12 chữ số).</span>
                            </div>
                            <div class="group-input mb-3">
                                <label for="address">Địa chỉ*</label>
                                <input type="text" name="address" id="address" class="form-control mb-3" placeholder="Nhập địa chỉ">
                                <span style="display: none;" id="address-title" class="text-danger">Vui lòng nhập địa chỉ</span>
                            </div>
                            <div class="group-input mb-3">
                                <label for="date_of_birth">Năm sinh*</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control mb-3">
                                <span style="display: none;" id="date_of_birth-title" class="text-danger">Vui lòng nhập năm sinh</span>
                            </div>
                            <div class="form-group">
                                <label for="avatar" class="form-label">Ảnh đại diện</label>
                                <input type="file" name="avatar" id="avatar" class="form-control mb-3" accept="image/*">
                                <span style="display: none;" id="avatar-error" class="text-danger">Vui lòng chọn ảnh hợp lệ (PNG, JPG, JPEG, kích thước nhỏ hơn 2MB).</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="reset" class="btn btn-outline-danger">Nhập lại</button>
                                <button type="submit" class="btn btn-warning">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript Bắt Lỗi Form -->
        <script>
            function validateForm() {
                let isValid = true;

                // Lấy giá trị các trường
                const email = document.getElementById("email").value.trim();
                const name = document.getElementById("name").value.trim();
                const tel = document.getElementById("tel").value.trim();
                const address = document.getElementById("address").value.trim();
                const dateOfBirth = document.getElementById("date_of_birth").value.trim();
                const avatar = document.getElementById("avatar").files[0];

                // Reset lỗi
                document.getElementById("tel-error").style.display = "none";
                document.getElementById("address-title").style.display = "none";
                document.getElementById("date_of_birth-title").style.display = "none";
                document.getElementById("avatar-error").style.display = "none";

                // Kiểm tra email
                if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    alert("Vui lòng nhập email hợp lệ!");
                    isValid = false;
                }

                // Kiểm tra họ và tên
                if (!name) {
                    alert("Vui lòng nhập họ và tên!");
                    isValid = false;
                }

                // Kiểm tra số điện thoại
                if (!tel || !/^[0-9]{10,12}$/.test(tel)) {
                    document.getElementById("tel-error").style.display = "block";
                    isValid = false;
                }

                // Kiểm tra địa chỉ
                if (!address) {
                    document.getElementById("address-title").style.display = "block";
                    isValid = false;
                }

                // Kiểm tra ngày sinh
                if (!dateOfBirth) {
                    document.getElementById("date_of_birth-title").style.display = "block";
                    isValid = false;
                }

                // Kiểm tra hình ảnh
                if (avatar) {
                    const allowedTypes = ["image/jpeg", "image/png", "image/jpg"];
                    const maxSize = 2 * 1024 * 1024; // 2MB
                    if (!allowedTypes.includes(avatar.type) || avatar.size > maxSize) {
                        document.getElementById("avatar-error").style.display = "block";
                        isValid = false;
                    }
                }

                return isValid; // Trả về false nếu có lỗi
            }
        </script>
<?php
    }
}
?>
