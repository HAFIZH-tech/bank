<?php
session_start();
require_once("config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN FINTECH SEKOLAH</title>
        <link rel="stylesheet" href="stylesheet.css">
        <script src="scriptt.js"></script>
    </head>
    <body>
        <form action="login-proses.php" method="POST">
        <header>
            <h2>Fintech</h2>
            <span class="logo">
                <i class='bx bxs-registered'></i>
            </span>
            <button class="login" onclick="showLoginForm()">Login</button>
        </header>
        <div class="form">
        <span class="icon-close" onclick="hide()">
        <i class='bx bx-x'></i>
        </span>
        <h2> LOGIN </h2>
            <div class="input-box">
            <span class="icon">
            <i class='bx bxs-user'></i>
            </span>
                <input type="text" id="username" name="username" required>
                <label for="username">username</label>
            </div>
            <div class="input-box">
            <span class="icon">
            <i class='bx bxs-lock-alt' ></i>
            </span>
                <input type="password" id="password" name="password" required>
                <label for="password">password</label>
            </div>
            <div class="level">
                <select class="dropdown" name="level">
                    <option value="manajemen">Bank</option>
                    <option value="administrator">Kantin</option>
                    <option value="siswa">Siswa</option>
                </select>
            </div>
            <div class="menu">
              <button class="registerbox">Login</button>
            </div>
            <div class="login-register">
            <p>Don't have an account?
            <a href="#" class="register-link">Register</a>
        </div>
        </form>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </body>
</html>