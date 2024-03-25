<?php
// session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-lg-6 bg-light">
                <form id="signup" class="form needs-validation" method="post" action="index.php?controller=register&action=changePass_act" novalidate>
                    <h1 class="text-center">Đổi mật khẩu</h1>
                    <?php if (!isset($_SESSION['username_S']) || !$_SESSION['username_S']) : ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nhập username" required minlength="3">
                            <div class="invalid-feedback">Vui lòng nhập username (ít nhất 3 ký tự).</div>
                        </div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu cũ:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu cũ" required minlength="6">
                        <div class="invalid-feedback">Mật khẩu phải có ít nhất 6 ký tự.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password1" class="form-label">Mật khẩu mới:</label>
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Nhập mật khẩu mới" required minlength="6">
                        <div class="invalid-feedback">Mật khẩu mới phải có ít nhất 6 ký tự.</div>
                    </div>

                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Nhập lại mật khẩu mới:</label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Xác nhận mật khẩu mới" required minlength="6">
                        <div class="invalid-feedback">Vui lòng xác nhận mật khẩu mới (ít nhất 6 ký tự).</div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Gửi" class="btn btn-primary" name="btnClick">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>