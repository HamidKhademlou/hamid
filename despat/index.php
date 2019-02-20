<?php
require_once "student.php";
$students = new student();
$out = $students->one_student();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table,
        tr,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <table>
        <?php foreach ($out as $key => $value) : ?>
        <tr>
            <td><?= $value["id"] ?></td>
            <td><?= $value["firstname"] ?></td>
            <td><?= $value["lastname"] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>