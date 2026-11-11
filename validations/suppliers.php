<?php
require_once __DIR__ . "/../repositories/suppliers.php";
require_once __DIR__ . "/../repositories/user.php";
function getSupplierRequest($request){
    return[
        'supplier_id' => trim(htmlspecialchars($request["id"])),
        'supplier_name' => trim(htmlspecialchars($request["supplier_name"])),
        'email' => trim(htmlspecialchars($request["email"])),
        'phone' => trim(htmlspecialchars($request["phone"])),
        'address' => trim(htmlspecialchars($request["address"])),
        'product_types' => trim(htmlspecialchars($request["product_types"])),
        'partnership_date' => trim(htmlspecialchars($request["partnership_date"])),
    ];
}

function validateSupplier($request, $ignoreSupplierId = 0){
    $errors = [];
    if($request['supplier_name'] == ''){
        $errors['supplier_name'] = "nama pemasok perlu diisi";
    }
    elseif(mb_strlen($request['supplier_name']) > 100){
        $errors['supplier_name'] = "nama pemasok tidak boleh di atas 100 karakter";
    }
    elseif(preg_match('/[0-9]/',$request['supplier_name'])){
        $errors['supplier_name'] = "nama panjang tidak boleh ada angka";
    }
    
    if($request['email'] == ''){
        $errors['email'] = "email pemasok perlu diisi";
    }
    elseif(mb_strlen($request['email']) > 100){
        $errors['email'] = "email pemasok tidak boleh di atas 100 karakter";
    }
    elseif(!filter_var($request['email'], FILTER_VALIDATE_EMAIL) ){
        $errors['email'] = "Email yang diberikan tidak valid";
    }
    elseif(isEmailTaken($request['email'])){
        $errors['email'] = "Email sudah didaftarkan sebelumnya";
    }
    
    if($request['phone'] == ''){
        $errors['phone'] = "nomor telepon pemasok perlu diisi";
    }
    elseif(mb_strlen($request['phone']) > 15){
        $errors['phone'] = "nomor telepon pemasok tidak boleh di atas 15 karakter";
    }

    if($request['address'] == ''){
        $errors['address'] = "alamat pemasok perlu diisi";
    }

    if($request['product_types'] == ''){
        $errors['product_types'] = "jenis produk pemasok perlu diisi";
    }elseif(mb_strlen($request['product_types']) > 100){
        $errors['product_types'] = "jenis produk pemasok tidak boleh di atas 100 karakter";
    }

    if($request['partnership_date'] == ''){
        $errors['partnership_date'] = "tanggal partnership pemasok perlu diisi";
    }
    elseif(!strtotime($request['partnership_date'])){
        $errors['partnership_date'] = "tanggal partnership masuk wajib diisi dengan tepat";
    }
    return $errors;     
}