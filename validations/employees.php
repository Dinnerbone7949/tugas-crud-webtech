<?php
require_once __DIR__ . "/../repositories/employees.php";
function getEmployeeRequest($request){
    return[
        'employee_id' => trim(htmlspecialchars($request["id"])),
        'employee_number' => trim(htmlspecialchars($request["employee_number"])),
        'full_name' => trim(htmlspecialchars($request["full_name"])),
        'gender' => trim(htmlspecialchars($request["gender"])),
        'birth_date' => trim(htmlspecialchars($request["birth_date"])),
        'position' => trim(htmlspecialchars($request["position"])),
        'salary' => trim(htmlspecialchars($request["salary"])),
    ];
}

function validateEmployee($request, $ignoreEmployeeId = 0){
    $errors = [];
    if($request['employee_number'] == ''){
        $errors['employee_number'] = "nomor karyawan perlu diisi";
    }
    elseif(mb_strlen($request['employee_number']) > 10){
        $errors['employee_number'] = "nomor karyawan tidak boleh lebih dari 10 karakter";
    }
    elseif(isEmployeeNumberTaken($request['employee_number'], $ignoreEmployeeId)){
        $errors['employee_number'] = "nomor karyawan sudah terdaftar sebelumnya";
    }

    if($request['full_name'] == ''){
        $errors['full_name'] = "nama panjang perlu diisi";
    }
    elseif(mb_strlen($request['full_name']) > 100){
        $errors['full_name'] = "nama panjang tidak boleh lebih dari 100 karakter";
    }
    elseif(preg_match('/[0-9]/',$request['full_name'])){
        $errors['full_name'] = "nama panjang tidak boleh ada angka";
    }

    if($request['gender'] == ''){
        $errors['gender'] = "gender perlu dipilih terlebih dahulu";
    }
    elseif(($request['gender'] != 'M') && ($request['gender'] != 'F')){
        $errors['gender'] = "Wajib memilih antara perempuan atau laki-laki";
    }

    if($request['birth_date'] == ''){
        $errors['birth_date'] = "tanggal lahir perlu diisi";
    }
    elseif(!strtotime($request['birth_date'])){
        $errors['birth_date'] = "tanggal lahir wajib diisi dengan tepat";
    }

    if($request['position'] == ''){
        $errors['position'] = "posisi perlu diisi";
    }
    elseif(($request['position'] != 'Cashier') && ($request['position'] != 'Warehouse Staff') && ($request['position'] != 'Admin')){
        $errors['position'] = "posisi wajib diisi dengan tepat";
    }

    if($request['salary'] == ''){
        $errors['salary'] = "gaji perlu diisi";
    }
    elseif(!is_int(intval($request['salary']))){
        $errors['salary'] = "gaji wajib diisi dengan angka";
    }
    elseif($request['salary'] <= 0){
        $errors['salary'] = "gaji wajib diisi dengan tepat";
    }

    return $errors;
}