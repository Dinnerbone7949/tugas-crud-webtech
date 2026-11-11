<?php
$pro = "products";
$sup = "suppliers";
$emp = "employees";
?>

<topbar>
    <a href="index.php">home</a>
    <a href="../../pages/public/<?= $pro ?>.php"><?= $pro ?></a>
    <a href="../../pages/public/<?= $sup ?>.php"><?= $sup ?></a>
    <a href="../../pages/public/<?= $emp ?>.php"><?= $emp ?></a>
    <a href="../../actions/auth/logout.php">Logout</a>
</topbar>