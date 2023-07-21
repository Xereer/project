<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    require_once 'connect.php';
    // require_once 'typeTable.php';
    // require_once 'startTable.php';

    $str = mysqli_query($connect, query: "SELECT * FROM `university` WHERE `isArchive` = '0'");
    $str = mysqli_fetch_all($str);
    foreach ($str as $value) {
        echo ($value[3]) . '<br>';
    }
    ?>
    <br>
    <form action="CRUD/create.php" method="post">
        <p>Родитель</p>
        <input type="text" name="parent">
        <p>Новый элемент</p>
        <input type="text" name="child"><br>
        <p><button type="sumbit">Добавить</button></p>
    </form><br>

    <form action="CRUD/update.php" method="post">
        <p>Название</p>
        <input type="text" name="name">
        <p>Новое название</p>
        <input type="text" name="newName"><br>
        <p><button type="sumbit">Изменить</button></p>
    </form><br>

    <form action="CRUD/delete.php" method="post">
        <p>Название</p>
        <input type="text" name="deleteName">
        <p><button type="sumbit">Удалить</button></p>
    </form>
    <form action="CRUD/recover.php">
        <p><button type="sumbit">Восстановить</button></p>
    </form>


</body>

</html>