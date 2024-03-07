<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css?family=Open+Sans&display=swap");
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
            font-family: "Open Sans", sans-serif;
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
    </style>
</head>

<body>
    <div class="container">
        <form id="signup" class="form">
            <h1>Sign Up</h1>
            <div class="form-field">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Nhập Username" />
                <small></small>
            </div>

            <div class="form-field">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Nhập password" />
                <small></small>
            </div>

            <div class="form-field">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm password chưa đúng" />
                <small></small>
            </div>
            <div class="form-field">
                <label for="name">Họ tên:</label>
                <input type="text" name="name" id="name" placeholder="Nhập họ tên:" />
                <small></small>
            </div>
            <div class="form-field">
                <label for="diachi">Địa chỉ:</label>
                <input type="text" name="diachi" id="diachi" placeholder="Nhập địa chỉ:" />
                <small></small>
            </div>
            <!-- <div class="form-field">
                <label for="Email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Enter your email" />
                <small></small>
            </div> -->
            <div class="form-field">
                <input type="submit" value="Sign Up" class="btn" />
            </div>
        </form>
    </div>
    <script>
        const usernameEl = document.querySelector("#username");
        const emailEl = document.querySelector("#email");
        const passwordEl = document.querySelector("#password");
        const confirmPasswordEl = document.querySelector("#confirm-password");
        const form = document.querySelector("#signup");
        form.addEventListener("submit", function(e) {
            e.preventDefault();
            validateForm();
        });
        const validateForm = () => {
            let isForm = form.checkVisibility();
            let isValid = checkUsername();
            isValid = isValid && checkPassword();
            isValid = isValid && checkConfirmPassword();
            isValid = isValid && checkHo();
            isValid = isValid && checkDiaChi();
            // isValid = isValid && checkEmail();
            // isValid = isValid && checkPhone();

            if (isValid && isForm) {
                storeData();
            }
        };
        const isRequired = (value) => (value === "" ? false : true);
        const showError = (input, message) => {
            const formField = input.parentElement;
            formField.classList.remove("success");
            formField.classList.add("error");
            const error = formField.querySelector("small");
            error.textContent = message;
        };
        const showSuccess = (input) => {
            const formField = input.parentElement;
            formField.classList.remove("error");
            formField.classList.add("success");
            const error = formField.querySelector("small");
            error.textContent = "";
        };
        const storeData = () => {
            const formData = {
                username: usernameEl.value,
                email: emailEl.value,
                password: password.value,
            };
            localStorage.setItem("formData", JSON.stringify(formData));
        };
        const checkUsername = () => {
            let isValid = false;
            let min = 3;
            let max = 25;
            const username = usernameEl.value.trim();
            if (!isRequired(username)) {
                showError(usernameEl, "Username chưa nhập.");
            } else if (!isBetween(username.length, min, max)) {
                showError(
                    usernameEl,
                    `Username must be between ${min} and ${max} characters.`
                );
            } else {
                showSuccess(usernameEl);
                isValid = true;
            }
            return isValid;
        };
        const checkHo = () => {
            let isValid = false;
            const ho = document.querySelector("#name").value.trim();
            const hoEl = document.querySelector("#name");
            if (!isRequired(ho)) {
                showError(hoEl, "Họ chưa nhập");
            } else {
                showSuccess(hoEl);
                isValid = true;
            }
            return isValid;
        };
        const checkDiaChi = () => {
            let isValid = false;
            const ten = document.querySelector("#diachi").value.trim();
            const tenEl = document.querySelector("#diachi");
            if (!isRequired(ten)) {
                showError(tenEl, "Địa chỉ chưa nhập");
            } else {
                showSuccess(tenEl);
                isValid = true;
            }
            return isValid;
        };
        // const checkPhone = () => {
        //     let isValid = false;
        //     const phoneEl = document.querySelector("#phone");
        //     const value = phoneEl.value;

        //     const phonePattern = /^\d{3}-\d{3}-\d{4}$/; // Regex pattern for "555-555-5555"

        //     if (!isRequired(value)) {
        //         showError(phoneEl, "Phone chưa hợp lệ");
        //     } else if (!phonePattern.test(value)) {
        //         showError(phoneEl, "Phone chưa chuẩn 555.555.5555");
        //     } else {
        //         isValid = true;
        //         showSuccess(phoneEl);
        //     }

        //     return isValid;
        // };
        // const checkEmail = () => {
        //     let isValid = false;
        //     const value = emailEl.value.trim();
        //     if (!isRequired(value)) {
        //         showError(emailEl, "Email chưa nhập.");
        //     } else if (!isEmailValid(value)) {
        //         showError(emailEl, "Email không hợp lệ.");
        //     } else {
        //         isValid = true;
        //         showSuccess(emailEl);
        //     }
        //     return isValid;
        // };
        const checkPassword = () => {
            let isValid = false;
            const value = passwordEl.value.trim();
            if (!isRequired(value)) {
                showError(passwordEl, "Password chưa nhập.");
            } else if (!isPasswordSecure(value)) {
                showError(
                    passwordEl,
                    "Password tối thiểu 8 kí tự: 1 in thường, 1 in hoa, 1 số, 1 ký tự đặc biệt (!@#$%^&*)"
                );
            } else {
                showSuccess(passwordEl);
                isValid = true;
            }
            return isValid;
        };
        const checkConfirmPassword = () => {
            let valid = false;
            // check confirm password
            const confirmPassword = confirmPasswordEl.value.trim();
            const password = passwordEl.value.trim();

            if (!isRequired(confirmPassword)) {
                showError(confirmPasswordEl, "PasswordConfirm chưa nhập");
            } else if (password !== confirmPassword) {
                showError(confirmPasswordEl, "PasswordConfirm chưa đúng");
            } else {
                showSuccess(confirmPasswordEl);
                valid = true;
            }

            return valid;
        };
        const isBetween = (length, min, max) =>
            length < min || length > max ? false : true;
        const isPasswordSecure = (value) => {
            const re = new RegExp(
                "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})"
            );
            return re.test(value);
        };
        const isEmailValid = (value) => {
            const re =
                /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(value);
        };

        const debounce = (fn, delay = 500) => {
            let timeoutId;
            return (...args) => {
                console.log(...args);
                // cancel the previous timer
                if (timeoutId) {
                    clearTimeout(timeoutId);
                }
                // setup a new timer
                timeoutId = setTimeout(() => {
                    fn.apply(null, args);
                }, delay);
            };
        };

        form.addEventListener(
            "input",
            debounce(function(e) {
                switch (e.target.id) {
                    case "username":
                        checkUsername();
                        break;
                    case "email":
                        checkEmail();
                        break;
                    case "password":
                        checkPassword();
                        break;
                    case "confirm-password":
                        checkConfirmPassword();
                        break;
                    case "ho":
                        checkHo();
                        break;
                    case "diachi":
                        checkDiaChi();
                        break;
                    case "phone":
                        checkPhone();
                        break;
                }
            })
        );
    </script>
</body>

</html>