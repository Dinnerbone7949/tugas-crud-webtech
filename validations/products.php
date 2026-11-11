<?php
require_once __DIR__ . "/../repositories/products.php";

function getProductRequest($request){
    return[
        'product_id' => trim(htmlspecialchars($request["id"])),
        'product_code' => trim(htmlspecialchars($request["product_code"])),
        'product_name' => trim(htmlspecialchars($request["product_name"])),
        'category' => trim(htmlspecialchars($request["category"])),
        'unit' => trim(htmlspecialchars($request["unit"])),
        'price' => trim(htmlspecialchars($request["price"])),
        'stock' => trim(htmlspecialchars($request["stock"])),
        'entry_date' => trim(htmlspecialchars($request["entry_date"])),
        'description' => trim(htmlspecialchars($request["description"])),
    ];
}

function validateProduct($request, $ignoreProductId = 0){
    $errors = [];
    if($request['product_code'] == ''){
        $errors['product_code'] = "kode produk perlu diisi";
    }
    elseif(!is_int(intval($request['product_code']))){
        $errors['product_code'] = "kode produk wajib diisi dengan angka";
    }
    elseif(mb_strlen($request['product_code']) > 10){
        $errors['product_code'] = "kode produk tidak boleh di atas 10 karakter";
    }

    if($request['product_name'] == ''){
        $errors['product_name'] = "nama produk perlu diisi";
    }
    elseif(mb_strlen($request['product_name']) > 100){
        $errors['product_name'] = "nama produk tidak boleh di atas 100 karakter";
    }

    if($request['category'] == ''){
        $errors['category'] = "kategori perlu diisi";
    }
    elseif(($request['category'] != 'Food') && ($request['category'] != 'Drink') && ($request['category'] != 'Stationery') && ($request['category'] != 'Uniform')){
        $errors['category'] = "pilih kategori dengan tepat";
    }
        
    if($request['unit'] == ''){
        $errors['unit'] = "unit perlu diisi";
    }
    elseif(($request['unit'] != 'Pcs') && ($request['unit'] != 'Pack') && ($request['unit'] != 'Bottle')){
        $errors['unit'] = "pilih unit dengan tepat";
    }

    if($request['price'] == ''){
        $errors['price'] = "harga perlu diisi";
    }
    elseif(!is_int(intval($request['price']))){
        $errors['price'] = "harga wajib diisi dengan angka";
    }
    elseif($request['price'] <= 0){
        $errors['price'] = "harga wajib diisi dengan tepat";
    }

    if($request['stock'] == ''){
        $errors['stock'] = "stok perlu diisi";
    }
    elseif(!is_int(intval($request['stock']))){
        $errors['stock'] = "stok wajib diisi dengan angka";
    }
    elseif($request['stock'] <= 0){
        $errors['stock'] = "stok wajib diisi dengan tepat";
    }

    if($request['entry_date'] == ''){
        $errors['entry_date'] = "tanggal masuk perlu diisi";
    }
    elseif(!strtotime($request['entry_date'])){
        $errors['entry_date'] = "tanggal masuk wajib diisi dengan tepat";
    }

    if($request['description'] == ''){
        $errors['description'] = "deskripsi produk perlu diisi";
    }
    return $errors;
}