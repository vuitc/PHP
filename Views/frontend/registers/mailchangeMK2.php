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
        <form id="signup" class="form" method="post" action="index.php?controller=register&action=mailPass_act2">
            <h1>Nhập mật khẩu mới (qua mail)</h1>
            <?php
            // if (!isset($_SESSION['username_S']) || !$_SESSION['username_S']) {
            //     echo '<div class="form-field">
            //                 <label for="username">Username:</label>
            //                 <input type="text" name="username" id="username" placeholder="Nhập username" />
            //                 <small></small>
            //             </div>';
            // }
            ?>
            <div class="form-field">
                <label for="pass">Mật khẩu:</label>
                <input type="text" name="pass" id="pass" placeholder="Nhập mật khẩu mới" />
                <small></small>
            </div>
            <div class="form-field">
                <input type="submit" value="Submit" class="btn" name="btnClick" />
            </div>
        </form>
    </div>


</html>