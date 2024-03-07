<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toggle Password Visibility</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    :root {
        --error-color: #dc3545;
        --success-color: #28a745;
        --warning-color: #ffc107;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;
        background-color: #f4f4f4;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .container {
        background-color: #fff;
        padding: 1em;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        width: 400px;
    }

    .form {
        padding: 10px 20px;
    }

    .form h1 {
        font-size: 1.5em;
        text-align: center;
        margin-bottom: 20px;
    }

    .form-field {
        margin-bottom: 5px;
    }

    .form-field label {
        display: block;
        color: #777;
        margin-bottom: 5px;
    }

    .form-field input {
        border: solid 2px #f0f0f0;
        border-radius: 3px;
        padding: 10px;
        margin-bottom: 5px;
        font-size: 14px;
        display: block;
        width: 100%;
    }

    .form-field input:focus {
        outline: none;
    }

    .form-field.error input {
        border-color: var(--error-color);
    }

    .form-field.success input {
        border-color: var(--success-color);
    }

    .form-field small {
        color: var(--error-color);
    }

    /* button */

    .btn {
        width: 100%;
        padding: 3%;
        background: #007bff;
        border-bottom: 2px solid #007bff;
        border-top-style: none;
        border-right-style: none;
        border-left-style: none;
        color: #fff;
        text-transform: uppercase;
    }

    .btn:hover {
        background: #0069d9;
        cursor: pointer;
    }

    .btn:focus {
        outline: none;
    }

    #togglePassword:hover {
        color: red;
    }

    .showError {
        color: red;
        padding-bottom: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <form id="signin" class="form" method="post" action="index.php?controller=register&action=dangnhap_act">
            <h1>Đăng nhập</h1>
            <div class="form-field">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" autocomplete="off">
                <small></small>
            </div>
            <div class="form-field">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" autocomplete="off">
                <i class="bi bi-eye-slash" id="togglePassword"
                    style="position: relative; top: -40px; left: 300px;; cursor: pointer;"></i>
                <small style="display: block;"></small>
            </div>
            <small class="showError"></small>
            <div class="form-field">
                <input type="submit" value="Đăng nhập" name="btnClick" class="btn">
            </div>
            <div class="form-field">
                <span>Đăng kí tài khoản </span><a href="index.php?controller=register">Đăng kí ngay</a>
            </div>
        </form>
    </div>
    <script>
    // // Lấy các phần tử input từ DOM
    // var usernameInput = document.getElementById('username');
    // var passwordInput = document.getElementById('password');

    // // Hàm kiểm tra tính hợp lệ của tên người dùng
    // function validateUsername() {
    //     var username = usernameInput.value.trim();
    //     var formField = usernameInput.parentElement;
    //     var errorSmall = formField.querySelector('small');

    //     if (username === '') {
    //         formField.classList.add('error');
    //         errorSmall.textContent = 'Trường này không được để trống';
    //         return false;
    //     } else if (username.length < 3) {
    //         formField.classList.add('error');
    //         errorSmall.textContent = 'Username phải có ít nhất 3 kí tự';
    //         return false;
    //     } else {
    //         formField.classList.remove('error');
    //         errorSmall.textContent = '';
    //         return true;
    //     }
    // }

    // // Hàm kiểm tra tính hợp lệ của mật khẩu
    // function validatePassword() {
    //     var password = passwordInput.value.trim();
    //     var formField = passwordInput.parentElement;
    //     var errorSmall = formField.querySelector('small');

    //     if (password === '') {
    //         formField.classList.add('error');
    //         errorSmall.textContent = 'Trường này không được để trống';
    //         return false;
    //     } else if (password.length < 6) {
    //         formField.classList.add('error');
    //         errorSmall.textContent = 'Password phải có ít nhất 6 kí tự';
    //         return false;
    //     } else {
    //         formField.classList.remove('error');
    //         errorSmall.textContent = '';
    //         return true;
    //     }
    // }

    // // Hàm kiểm tra đăng nhập sau khi người dùng nhấn submit
    // function checkSignIn() {
    //     var formData1 = JSON.parse(localStorage.getItem('formData'));
    //     var isUsernameValid = validateUsername();
    //     var isPasswordValid = validatePassword();

    //     if (isUsernameValid && isPasswordValid) {
    //         var isUsername = usernameInput.value.trim() === formData1.username;
    //         var isPassword = passwordInput.value.trim() === formData1.password;

    //         if (isUsername && isPassword) {
    //             alert('Đăng nhập thành công');
    //         } else {
    //             var showError = document.querySelector('.showError');
    //             showError.textContent = 'Username hoặc password chưa đúng. Vui lòng kiểm tra lại';
    //         }
    //     }
    // }

    // // Bắt sự kiện khi người dùng thay đổi giá trị tên người dùng
    // usernameInput.addEventListener('input', validateUsername);
    // usernameInput.addEventListener('blur', validateUsername);

    // // Bắt sự kiện khi người dùng thay đổi giá trị mật khẩu
    // passwordInput.addEventListener('input', validatePassword);
    // passwordInput.addEventListener('blur', validatePassword);

    // // Bắt sự kiện khi người dùng nhấn submit
    // var form = document.getElementById('signin');
    // form.addEventListener('submit', function(event) {
    //     event.preventDefault();
    //     checkSignIn();
    // });

    // // Hàm kiểm tra độ dài giới hạn của chuỗi
    // const isBetween = (input, min = 3, max = 25) => input.length >= min && input.length <= max;

    // //Bắt sự kiện eye password toggle text<=>password
    // const togglePassword = document.querySelector('#togglePassword');
    // togglePassword.addEventListener('click', function() {
    //     var eye = passwordInput.getAttribute('type');
    //     eye = eye === 'password' ? 'text' : 'password';
    //     passwordInput.setAttribute('type', eye);
    //     // tính chất ghi đè class 
    //     togglePassword.classList.toggle('bi-eye');
    // });
    </script>
</body>

</html>