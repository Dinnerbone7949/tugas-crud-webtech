<?php
require_once __DIR__ . "/../../config/database.php";
if (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === "GET") {
    try{
        $pdo->beginTransaction();
        $id = htmlspecialchars($_GET['id']);
        $query = "delete from products where product_id = :product_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            "product_id" => $id
        ]);
        $pdo->commit();
        header("Location: ../../pages/products/index.php");
        exit;
    } catch (PDOException $e) {
        $pdo->rollback();
        throw $e;
    }
}