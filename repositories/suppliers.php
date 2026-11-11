<?php 
require_once __DIR__ . "/../config/database.php";

function getSuppliers(){
    global $pdo;
    $query = "select * from suppliers";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $suppliers = $stmt->fetchAll();
    return $suppliers;
}

function getSupplier($id){
  global $pdo;
  $query = "select * from suppliers where supplier_id = :id";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['id' => $id]);
  $supplier = $stmt->fetch();
  if(!$supplier){
    Header("Location: ../suppliers/index.php");
    exit;
  }
  return $supplier;
}