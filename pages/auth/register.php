<?php
session_start();
require_once __DIR__. "/../../middleware/auth.php";
requireGuest();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="../../css/index.css">
</head>
<body class="auth-form">
<div class="form">
    <h1>Register</h1>
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
    <form method="POST" action="../../actions/auth/register.php">
        <div class="form-div">
          <label for="username">Username</label>
          <input value="<?= $old['name'] ?? ''?>" type="text" id="username" name="username" placeholder="Username">
        </div>
        <?php if(isset($errors["username"])): ?>
          <p style="font-size: 12px; margin-top: 4px; color: red">
            <?= $errors["username"] ?> 
          </p>
        <?php endif?>
        <div class="form-div">
          <label for="email">Email</label>
          <input value="<?= $old['email'] ?? ''?>" type="email" id="email" name="email" placeholder="@mail.com">
        </div>
        <?php if(isset($errors["email"])): ?>
           <p style="font-size: 12px; margin-top: 4px; color: red">
             <?= $errors["email"] ?> 
           </p>
         <?php endif?>
          <div class="form-div">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" placeholder="password">
          </div>
          <?php if(isset($errors["password"])): ?>
          <p style="font-size: 12px; margin-top: 4px; color: red">
            <?= $errors["password"] ?> 
          </p>
        <?php endif?>
          <div class="form-div">
            <label for="password_confirmation">Konfirmasi password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="konfirmasi password">
          </div>
          <?php if(isset($errors["password_confirmation"])): ?>
          <p style="font-size: 12px; margin-top: 4px; color: red">
            <?= $errors["password_confirmation"] ?> 
          </p>
        <?php endif?>

        <button name="register" type="submit" >Daftar</button>
      </form>
    <span class="form-link">Sudah punya akun? <a href="login.php">Masuk di sini</a></span> 
</div>
</body>
</html>