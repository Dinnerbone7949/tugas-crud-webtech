<?php
require_once __DIR__ . "/../../config/database.php";
if (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === "GET") {
    try{
        $pdo->beginTransaction();
        $id = htmlspecialchars($_GET['id']);
        $query = "delete from employees where employee_id = :employee_id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            "employee_id" => $id
        ]);
        $pdo->commit();
        header("Location: ../../pages/employees/index.php");
        exit;
    } catch (PDOException $e) {
        $pdo->rollback();
        throw $e;
    }
}