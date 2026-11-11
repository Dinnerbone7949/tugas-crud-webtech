<?php
require_once __DIR__ . "/../../middleware/auth.php";
session_start();
requireGuest();
$success = $_SESSION['success'] ?? '';
$errors = $_SESSION['errors'] ?? '';
$old = $_SESSION['old'] ?? '';
unset($_SESSION['success'], $_SESSION['errors'], $_SESSION['old']); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../../css/index.css">
</head>
<body class="auth-form">
<div class="form">
    <h1>Login</h1>
    <?php if(isset($success)):?>
        <p style="color: green; font-size: 12px; margin-bottom: 12px;">
          <?=$success?>
        </p>
    <?php endif?>
    <?php if(isset($errors['login'])):?>
        <p style="color: red; font-size: 12px; margin-bottom: 12px;">
            <?=$errors['login']?>
        </p>
    <?php endif?>
    <form method="POST" action="../../actions/auth/login.php">
        <div class="form-div">
            <label for="email">Email</label>
            <input value="<?= $old['email'] ?? ''?>" type="email" id="email" name="email" placeholder="abc@mail.com">
        </div>
        <?php if(isset($errors["email"])): ?>
            <p style="font-size: 12px; margin-top: 4px; color: red">
                <?= $errors["email"] ?> 
            </p>
        <?php endif?>
        <div class="form-div">
            <label for="password">password</label>
            <input value="<?= $old['password'] ?? ''?>" type="password" id="password" name="password" placeholder="Password">
        </div>
        <?php if(isset($errors["password"])): ?>
            <p style="font-size: 12px; margin-top: 4px; color: red">
            <?= $errors["password"] ?> 
            </p>
        <?php endif?>
        <button name="login" type="submit">Masuk</button>
    </form>
    <span class="form-link">Belum punya akun? <a href="register.php">Daftar di sini</a></span> 
</div>
</body>
</html>