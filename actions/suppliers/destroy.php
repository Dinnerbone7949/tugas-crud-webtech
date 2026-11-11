<?php
require_once __DIR__ . "/../../config/database.php";
if (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === "GET") {
    try{
        $pdo->beginTransaction();
        $id = htmlspecialchars($_GET['id']);
        $query = "delete from suppliers where supplier_id = :supplier_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            "supplier_id" => $id
        ]);
        $pdo->commit();
        header("Location: ../../pages/suppliers/index.php");
        exit;
    } catch (PDOException $e) {
        $pdo->rollback();
        throw $e;
    }
}