<?php 
require_once __DIR__. "/../../middleware/auth.php";
requireAuth();
requireRole(['admin', 'member']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tugas</title>
    <link rel="stylesheet" href="../../css/index.css">
</head>
<body>
    <main>
        <H1>Public table</H1>
        <a class="button" id="btn-1" href="products.php">products</a>
        <a class="button" id="btn-2" href="suppliers.php">suppliers</a>
        <a class="button" id="btn-3" href="employees.php">employees</a>
    </main>
</body>
</html>