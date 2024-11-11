<?php

namespace App\Views\Client\Pages\Auth;

use App\Views\BaseView;

class Register extends BaseView
{
  public static function render($data = null)
  {
    ?>
    <!--code HTML hiển thị giao diện -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
      <!-- Container để căn giữa form -->
      <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="width: 50rem;">
          <div class="card-body">
            <!-- Tiêu đề đăng ký -->
            <h2 class="text-center mb-4">Đăng ký</h2>

            <!-- Form đăng ký -->
            <form action="#">
              <!-- Tên người dùng hoặc email -->
              <div class="mb-3">
                <label for="username" class="form-label">Tên người dùng hoặc email *</label>
                <input type="text" id="username" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="phone" class="form-label">Số điện thoại *</label>
                <input type="text" id="phone" class="form-control" required>
              </div>

              <!-- Mật khẩu -->
              <div class="mb-3">
                <label for="password" class="form-label">Vui lòng nhập mật khẩu *</label>
                <div class="input-group">
                  <input type="password" id="password" class="form-control" required>
                  <button type="button" class="btn btn-outline-secondary" id="toggle-password" style="cursor: pointer;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-eye-slash" viewBox="0 0 16 16">
                      <path
                        d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z" />
                      <path
                        d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829" />
                      <path
                        d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z" />
                    </svg>
                  </button>
                </div>
              </div>

              <div class="mb-3">
                <label for="confirm-password" class="form-label">Nhập lại mật khẩu *</label>
                <div class="input-group">
                  <input type="password" id="confirm-password" class="form-control" required>

                </div>
              </div>
              <!-- Lưu mật khẩu -->
              <div class="mb-3 d-flex justify-content-between">
                <div class="form-check">
                  <input type="checkbox" id="save-pass" class="form-check-input">
                  <label for="save-pass" class="form-check-label">Lưu Mật khẩu</label>
                </div>
              </div>

              <!-- Nút Đăng ký -->
              <button type="submit" class="btn btn-warning w-100">Đăng ký</button>
            </form>

            <!-- Liên kết tạo tài khoản -->
            <div class="mt-3 text-center">
              <a href="/App/Views/Client/Pages/Auth/Login.php" class="text-decoration-none">Đã có tài khoản? Đăng nhập</a>
            </div>
          </div>
        </div>
      </div>

      <!-- Liên kết đến Bootstrap JS và Popper.js -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

      <!-- Thêm icon Bootstrap cho mắt -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

      <script>

        const togglePassword = document.getElementById('toggle-password');
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('confirm-password');
        const eyeIcon = document.getElementById('eye-icon');

        togglePassword.addEventListener('click', function () {
          // Kiểm tra nếu mật khẩu đang được ẩn
          const type = passwordField.type === 'password' ? 'text' : 'password';
          passwordField.type = type;
          confirmPasswordField.type = type; // Cũng thay đổi mật khẩu nhập lại

          // Thay đổi biểu tượng mắt
          if (type === 'password') {
            eyeIcon.classList.remove('bi-eye');
            eyeIcon.classList.add('bi-eye-slash');
          } else {
            eyeIcon.classList.remove('bi-eye-slash');
            eyeIcon.classList.add('bi-eye');
          }
        });

      </script>
      <?php
  }
}
?>