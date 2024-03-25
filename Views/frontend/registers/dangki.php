
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title>
</head>

<body>
<div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-lg-6">
                <div class="d-flex justify-content-center align-items-center bg-light">
                    <form id="signup" class="form needs-validation" method="post" action="index.php?controller=register&action=dangki_act" novalidate>
                        <h1 class="text-center mb-4">Tạo tài khoản</h1>
                        <div class="mb-1">
                            <label for="username" class="form-label">Tên người dùng:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên người dùng" required>
                            <div class="invalid-feedback">Vui lòng nhập tên người dùng (tối thiểu 3 ký tự).</div>
                        </div>

                        <div class="mb-1">
                            <label for="password" class="form-label">Mật khẩu:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required minlength="6">
                            <div class="invalid-feedback">Mật khẩu phải có ít nhất 6 ký tự.</div>
                        </div>

                        <div class="mb-1">
                            <label for="name" class="form-label">Họ tên:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ tên" required>
                            <div class="invalid-feedback">Vui lòng nhập họ tên.</div>
                        </div>

                        <div class="mb-1">
                            <label for="diachi" class="form-label">Địa chỉ:</label>
                            <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Nhập địa chỉ" required>
                            <div class="invalid-feedback">Vui lòng nhập địa chỉ.</div>
                        </div>

                        <div class="mb-1">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Địa chỉ email" required>
                            <div class="invalid-feedback">Vui lòng nhập địa chỉ email hợp lệ.</div>
                        </div>

                        <div class="mb-1">
                            <label for="phone" class="form-label">Nhập số điện thoại:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="555-555-5555" required>
                            <div class="invalid-feedback">Vui lòng nhập số điện thoại.</div>
                        </div>

                        <div class="mb-1 text-center">
                            <input type="submit" value="Sign Up" class="btn btn-primary" name="btnClick">
                        </div>

                        <div class="mb-1 text-center">
                            <span>Đã có tài khoản?</span>
                            <a href="index.php?controller=register&action=sign_in">Đăng nhập ngay</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script>
    // Bootstrap form validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
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