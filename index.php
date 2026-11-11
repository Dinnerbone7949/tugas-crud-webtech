<?php 
require_once __DIR__. "/middleware/auth.php";
requireAuth();
requireRole(['admin']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tugas</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <main>
        <H1>CRUD DESTIN</H1>
        <a class="button" id="btn-1" href="pages/products/index.php">products</a>
        <a class="button" id="btn-2" href="pages/suppliers/index.php">suppliers</a>
        <a class="button" id="btn-3" href="pages/employees/index.php">employees</a>
    </main>
</body>
</html>