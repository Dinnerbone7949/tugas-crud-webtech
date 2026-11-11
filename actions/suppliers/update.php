<?php
session_start();
require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../../validations/suppliers.php";
if (isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $pdo->beginTransaction();
        $request = getSupplierRequest($_POST);
        $errors = validateSupplier($request,  $request['supplier_id']);
        if (count($errors) > 0) {
            $_SESSION["errors"] = $errors;
            $_SESSION["old"] = $request;
            header('location: ../../pages/suppliers/edit.php?id=' . urlencode($request['supplier_id']));
            exit;
        }

        $query = "update suppliers set supplier_name = :supplier_name, email = :email, phone = :phone, address = :address, product_types = :product_types, partnership_date = :partnership_date where supplier_id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'supplier_name' => $request['supplier_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'product_types' => $request['product_types'],
            'partnership_date' => $request['partnership_date'],
            'id' => $request['supplier_id']
        ]);
        $pdo->commit();
        header('location: ../../pages/suppliers/index.php');
        exit;
    } catch (PDOException $e) {
        $pdo->rollback();
        throw $e;
    }
}
