<?php 
require __DIR__ . "/../../repositories/suppliers.php";
$suppliers = getSuppliers();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
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
                    <th>supplier name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>address</th>
                    <th>product types</th>
                    <th>partnership date</th>
                    <th>action</th>
                </tr>
            </thead>
    
            <tbody>
                <?php foreach($suppliers as $supplier):?>
                <tr>
                    <td><?= $supplier['supplier_id']?></td>
                    <td><?= $supplier['supplier_name']?></td>
                    <td><?= $supplier['email']?></td>
                    <td><?= $supplier['phone']?></td>
                    <td><?= $supplier['address']?></td>
                    <td><?= $supplier['product_types']?></td>
                    <td><?= $supplier['partnership_date']?></td>
                    <td>
                        <div> 
                            <a href="edit.php?id=<?= $supplier['supplier_id'] ?>">Edit</a>
                            <a href="../../actions/suppliers/destroy.php?id=<?= $supplier['supplier_id'] ?>" onclick="return confirm('Yakin ingin menghapus karyawan ini?')">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
</body>
</html>