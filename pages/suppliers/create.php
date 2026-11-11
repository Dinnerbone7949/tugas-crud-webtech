<?php
    session_start();
    $productTypes = ['Food', 'Drink', 'Stationery', 'Uniform'];
    require_once __DIR__ . "/../../repositories/suppliers.php";
    $errors = $_SESSION['errors'] ?? [];
    $old = $_SESSION['old'] ?? [];
    unset($_SESSION['errors'], $_SESSION['old']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Supplier</title>
    <link rel="stylesheet" href="../../css/index.css">
</head>
<body>
    <?php 
    include_once __DIR__ . "/../../components/admin/topbar.php";
    ?>
    <main>
        <form action="../../actions/suppliers/store.php" method="POST">
            <div class="form-div">
                <label for="supplier_name">supplier name</label>
                <input value="<?= $old['supplier_name'] ?? '' ?>" type="text" id="supplier_name" name="supplier_name" placeholder="Nama Supplier"><br>
            </div>
            <?php if(isset($errors["supplier_name"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["supplier_name"] ?> 
                </p>
            <?php endif ?>

            <div class="form-div">
                <label for="email">email</label>
                <input value="<?= $old['email'] ?? '' ?>" type="email" id="email" name="email" placeholder="email@example.com">
            </div>
            <?php if(isset($errors["email"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["email"] ?> 
                </p>
            <?php endif ?>

            <div class="form-div">
                <label for="phone">phone</label>
                <input value="<?= $old['phone'] ?? '' ?>" type="text" id="phone" name="phone" placeholder="08123456789">
            </div>
            <?php if(isset($errors["phone"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["phone"] ?> 
                </p>
            <?php endif ?>

            <div class="form-div">
                <label for="address">address</label> <br>
                <textarea id="address" name="address" placeholder="Alamat supplier..."><?= $old['address'] ?? '' ?></textarea> <br>
            </div>
            <?php if(isset($errors["address"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["address"] ?> 
                </p>
            <?php endif ?>

            <div class="form-div">
                <label for="product_types">product types</label> <br>
                <select name="product_types" id="product_types">
                    <?php foreach ($productTypes as $productType): ?>
                        <option <?= ($old['product_types'] ?? '') == $productType ? 'selected' : '' ?> value="<?= $productType ?>"><?= $productType ?></option>
                    <?php endforeach ?>
                </select> <br> 
            </div>
            <?php if(isset($errors["product_types"])): ?>                     
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["product_types"] ?>                         
                </p>                         
            <?php endif ?>                     

            <div class="form-div">
                <label for="partnership_date">partnership date</label>
                <input value="<?= $old['partnership_date'] ?? '' ?>" type="date" id="partnership_date" name="partnership_date"> <br>
            </div>
            <?php if(isset($errors["partnership_date"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["partnership_date"] ?> 
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