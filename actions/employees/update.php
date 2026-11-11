<?php
session_start();
require_once __DIR__ . "/../../config/database.php";
require_once __DIR__ . "/../../validations/employees.php";
if (isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $pdo->beginTransaction();
        $request = getEmployeeRequest($_POST);
        $errors = validateEmployee($request,  $request['employee_id']);
        if (count($errors) > 0) {
            $_SESSION["errors"] = $errors;
            $_SESSION["old"] = $request;
            header('location: ../../pages/employees/edit.php?id=' . urlencode($request['employee_id']));
            exit;
        }

        $query = "update employees set employee_number = :employee_number, full_name = :full_name, gender = :gender, birth_date = :birth_date, position = :position, salary = :salary where employee_id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            'employee_number' => $request['employee_number'],
            'full_name' => $request['full_name'],
            'gender' => $request['gender'],
            'birth_date' => $request['birth_date'],
            'position' => $request['position'],
            'salary' => $request['salary'],
            'id' => $request['employee_id']            
        ]);
        $pdo->commit();
        header('location: ../../pages/employees/index.php');
        exit;
    } catch (PDOException $e) {
        $pdo->rollback();
        throw $e;
    }
}
