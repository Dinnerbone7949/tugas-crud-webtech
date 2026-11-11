<?php
    session_start();
    $position = ['Cashier','Warehouse Staff','Admin'];
    require_once __DIR__ . "/../../repositories/employees.php";
    $errors = $_SESSION['errors'] ?? [];
    $old = $_SESSION['old'] ?? [];
    unset($_SESSION['errors'], $_SESSION['old']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="../../css/index.css">
</head>
<body>
    <?php 
    include_once __DIR__ . "/../../components/admin/topbar.php";
    ?>
    <main>
        <form action="../../actions/employees/store.php" method="POST">
            <div class="form-div">
                <label for="employee_number">nomor employee</label>
                <input value="<?= $old['employee_number'] ?? '' ?>" type="text" id="employee_number" name="employee_number" placeholder="0123-4567-8901"><br>
            </div>
            <?php if(isset($errors["employee_number"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["employee_number"] ?> 
                </p>
            <?php endif ?>

            <div class="form-div">
                <label for="full_name">full name</label>
                <input value="<?= $old['full_name'] ?? '' ?>" type="text" id="full_name" name="full_name" placeholder="name">
            </div>
            <?php if(isset($errors["full_name"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["full_name"] ?> 
                </p>
            <?php endif ?>

            <div class="form-div-gender">
                <p>Gender</p>
                <input type="radio" id="gender" name="gender" value="M" <?= ($old['gender'] ?? '') === 'M' ? 'checked' : '' ?>>
                <label for="gender">Male</label>
                <input type="radio" id="gender2" name="gender" value="F" <?= ($old['gender'] ?? '') === 'F' ? 'checked' : '' ?>>
                <label for="gender2">Female</label> <br>
            </div>
            <?php if(isset($errors["gender"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["gender"] ?> 
                </p>
            <?php endif ?>

            <div class="form-div">
                <label for="birth_date">tanggal lahir</label>
                <input value="<?= $old['birth_date'] ?? '' ?>" type="date" id="birth_date" name="birth_date"> <br>
            </div>
            <?php if(isset($errors["birth_date"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["birth_date"] ?> 
                </p>
            <?php endif ?>

            <div class="form-div">
                <label for="position">posisi</label> <br>
                <select name="position" id="position">
                    <?php foreach ($position as $pos): ?>
                        <option <?= ($old['position'] ?? '') == $pos ? 'selected' : '' ?> value="<?= $pos ?>"><?= $pos ?></option>
                    <?php endforeach ?>
                </select> <br> 
            </div>
            <?php if(isset($errors["position"])): ?>                     
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["position"] ?>                         
                </p>                         
            <?php endif ?>                     

            <div class="form-div">
                <label for="salary">salary</label> <br>
                <input value="<?= $old['salary'] ?? '' ?>" type="number" id="salary" name="salary" placeholder="0"> <br>
            </div>
            <?php if(isset($errors["salary"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["salary"] ?> 
                </p>
            <?php endif ?>

            <div id="action-form">
                <a href="index.php">batal</a>
                <button type="submit" name="store">Simpan</button>
            </div>
        </form>
    </main>
</body>
</html>     