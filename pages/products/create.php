<?php
    session_start();
    $categories = ['Food','Drink','Stationery','Uniform'];
    require_once __DIR__ . "/../../repositories/products.php";
    $errors = $_SESSION['errors'] ?? [];
    $old = $_SESSION['old'] ?? [];
    unset($_SESSION['errors'], $_SESSION['old']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="../../css/index.css">
</head>
<body>
    <?php 
    include_once __DIR__ . "/../../components/admin/topbar.php";
    ?>
    <main>
        <form action="../../actions/products/store.php" method="POST">
            <div class="form-div">
                <label for="product_code">kode produk</label>
                <input value="<?= $old['product_code'] ?? '' ?>" type="text" id="product_code" name="product_code" placeholder="001"><br>
            </div>
            <?php if(isset($errors["product_code"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["product_code"] ?> 
                </p>
            <?php endif ?>

            <div class="form-div">
                <label for="product_name">nama produk</label>
                <input value="<?= $old['product_name'] ?? '' ?>" type="text" id="product_name" name="product_name" placeholder="Nama Produk">
            </div>
            <?php if(isset($errors["product_name"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["product_name"] ?> 
                </p>
            <?php endif ?>

            <div class="form-div">
                <label for="category">kategori</label> <br>
                <select name="category" id="category">
                    <?php foreach ($categories as $category): ?>
                        <option <?= ($old['category'] ?? '') == $category ? 'selected' : '' ?> value="<?= $category ?>"><?= $category ?></option>
                    <?php endforeach ?>
                </select> <br> 
            </div>
            <?php if(isset($errors["category"])): ?>                     
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["category"] ?>                         
                </p>                         
            <?php endif ?>                     

            <div class="form-div-unit">
                <p>unit</p>
                <input type="radio" id="unit" name="unit" value="Pcs" <?= ($old['unit'] ?? '') === 'Pcs' ? 'checked' : '' ?>>
                <label for="unit">Pcs</label>
                <input type="radio" id="unit2" name="unit" value="Pack" <?= ($old['unit'] ?? '') === 'Pack' ? 'checked' : '' ?>>
                <label for="unit2">Pack</label>
                <input type="radio" id="unit3" name="unit" value="Bottle" <?= ($old['unit'] ?? '') === 'Bottle' ? 'checked' : '' ?>>
                <label for="unit3">Bottle</label> <br>
            </div>
            <?php if(isset($errors["unit"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["unit"] ?> 
                </p>
            <?php endif ?>              

            <div class="form-div">
                <label for="price">price</label> <br>
                <input value="<?= $old['price'] ?? '' ?>" type="number" id="price" name="price" placeholder="0"> <br>
            </div>
            <?php if(isset($errors["price"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["price"] ?> 
                </p>
            <?php endif ?>

            <div class="form-div">
                <label for="stock">stok</label> <br>
                <input value="<?= $old['stock'] ?? '' ?>" type="number" id="stock" name="stock" placeholder="0"> <br>
            </div>
            <?php if(isset($errors["stock"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["stock"] ?> 
                </p>
            <?php endif ?>

            <div class="form-div">
                <label for="entry_date">tanggal pemasokan</label>
                <input value="<?= $old['entry_date'] ?? '' ?>" type="date" id="entry_date" name="entry_date"> <br>
            </div>
            <?php if(isset($errors["entry_date"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["entry_date"] ?> 
                </p>
            <?php endif ?>

            <div class="form-div">
                <label for="description">deskripsi</label> <br>
                <textarea id="description" name="description" placeholder="Deskripsi produk..."><?= $old['description'] ?? '' ?></textarea> <br>
            </div>
            <?php if(isset($errors["description"])): ?>
                <p style="font-size: 12px; margin-top: 4px; color: red">
                    <?= $errors["description"] ?> 
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