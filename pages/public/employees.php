<?php 
require __DIR__ . "/../../repositories/employees.php";
$employees = getEmployees();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employees</title>
    <link rel="stylesheet" href="../../css/index.css">
</head>
<body>
    <?php 
    include_once __DIR__ . "/../../components/public/topbar.php";
    ?>
    <main>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>employee number</th>
                    <th>full name</th>
                    <th>gender</th>
                    <th>birth date</th>
                    <th>position</th>
                    <th>salary</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($employees as $employee):?>
                    <tr>
                        <td><?= $employee['employee_id']?></td>
                        <td><?= $employee['employee_number']?></td>
                        <td><?= $employee['full_name']?></td>
                        <td><?= $employee['gender']?></td>
                        <td><?= $employee['birth_date']?></td>
                        <td><?= $employee['position']?></td>
                        <td><?= $employee['salary']?></td>
                    </tr>
                    
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
</body>
</html>