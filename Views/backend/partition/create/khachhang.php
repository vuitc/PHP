<div class="col-12" style="min-height:80vh">
    <h1>Tạo tài khoản quản trị</h1>
    <form action="index.php?controller=admin&action=khachHangC" method="POST" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="customerName">Quản trị tên:</label>
            <input type="text" id="customerName" name="tenkh" class="form-control" required>
            <div class="invalid-feedback">Vui lòng nhập tên quản trị.</div>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" minlength="3" required>
            <div class="invalid-feedback">Username phải có ít nhất 3 ký tự.</div>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" minlength="6" required>
            <div class="invalid-feedback">Mật khẩu phải có ít nhất 6 ký tự.</div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
            <div class="invalid-feedback">Vui lòng nhập email hợp lệ.</div>
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ</label>
            <input type="text" id="address" name="diachi" class="form-control" required>
            <div class="invalid-feedback">Vui lòng nhập địa chỉ.</div>
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
            <div class="invalid-feedback">Vui lòng nhập số điện thoại.</div>
        </div>
        <button type="submit" class="btn btn-primary">Tạo admin</button>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- JavaScript kiểm tra tính hợp lệ -->
<script>
    (function () {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
    })();
</script>
