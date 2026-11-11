<?php 
require_once __DIR__ . "/../config/database.php";

function getProducts(){
    global $pdo;
    $query = "select * from products";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $products = $stmt->fetchAll();
    return $products;
}

function getProduct($id){
  global $pdo;
  $query = "select * from products where product_id = :id";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['id' => $id]);
  $product = $stmt->fetch();
  if(!$product){
    Header("Location: ../products/index.php");
    exit;
  }
  return $product;
}

function isProductCodeTaken($ProductNumber, $ignorproductId){
  global $pdo;
  $productId = intval($ignorproductId);
  $query = "select count(product_id) from products where product_code = :product_code && product_id != :id";
  $stmt = $pdo->prepare($query);
  $stmt->execute([
    "product_code"=> $ProductNumber,
    "id"=> $productId
    ]);

  $isProductCodeTaken = $stmt->fetchColumn() > 0;
  return $isProductCodeTaken;
}
