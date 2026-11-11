<?php 
require __DIR__ . "/../../repositories/products.php";
$products = getProducts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>products</title>
    <link rel="stylesheet" href="../../css/index.css">
</head>
<body>
    <?php 
    include_once __DIR__ . "/../../components/admin/topbar.php";
    ?>
    <main>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>code</th>
                    <th>name</th>
                    <th>category</th>
                    <th>unit</th>
                    <th>price</th>
                    <th>stock</th>
                    <th>pemasukan</th>
                    <th>deskripsi</th>
                    <th>action</th>
                </tr>
            </thead>
    
            <tbody>
                <?php foreach($products as $product):?>
                <tr>
                    <td><?= $product['product_id']?></td>
                    <td><?= $product['product_code']?></td>
                    <td><?= $product['product_name']?></td>
                    <td><?= $product['category']?></td>
                    <td><?= $product['unit']?></td>
                    <td><?= $product['price']?></td>
                    <td><?= $product['stock']?></td>
                    <td><?= $product['entry_date']?></td>
                    <td><?= $product['description']?></td>
                    <td>
                        <div> 
                            <a href="edit.php?id=<?= $product['product_id'] ?>">Edit</a>
                            <a href="../../actions/products/destroy.php?id=<?= $product['product_id'] ?>" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
</body>
</html>