<?php
require_once __DIR__. "/../../middleware/auth.php";
requireAuth();
requireRole(['admin']);
$pro = "products";
$sup = "suppliers";
$emp = "employees";
?>

<topbar>
    <a href="../..">home</a>
    <a href="../../pages/<?= $pro ?>/index.php"><?= $pro ?></a>
    <a href="../../pages/<?= $sup ?>/index.php"><?= $sup ?></a>
    <a href="../../pages/<?= $emp ?>/index.php"><?= $emp ?></a>
    <a id="addButton" href="create.php">tambah</a>
    <a href="../../actions/auth/logout.php">Logout</a>
</topbar>