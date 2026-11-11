<?php 
require_once __DIR__ . "/../config/database.php";

function getEmployees(){
    global $pdo;
    $query = "select * from employees";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $employees = $stmt->fetchAll();
    return $employees;
}

function isEmployeeNumberTaken($employeeNumber, $ignoremployeeId){
  global $pdo;
  $employeeId = intval($ignoremployeeId);
  $query = "select count(employee_id) from employees where employee_number = :employee_number && employee_id != :employee_id";
  $stmt = $pdo->prepare($query);
  $stmt->execute([
    "employee_number"=> $employeeNumber,
    "employee_id"=> $employeeId
    ]);

  $isEmployeeNumberTaken = $stmt->fetchColumn() > 0;
  return $isEmployeeNumberTaken;
}

function getEmployee($id){
  global $pdo;
  $query = "select * from employees where employee_id = :id";
  $stmt = $pdo->prepare($query);
  $stmt->execute(['id' => $id]);
  $employee = $stmt->fetch();
  if(!$employee){
    Header("Location: ../employees/index.php");
    exit;
  }
  return $employee;
}