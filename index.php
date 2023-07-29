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
    // // require_once 'typeTable.php';
    // require_once 'startTable.php';
    require_once 'CRUD/read.php';

    // $str = mysqli_query($connect, query: "SELECT * FROM `university` WHERE `isArchive` = '0'");
    // $str = mysqli_fetch_all($str);
    // //var_dump($str);
    // foreach ($str as $value) {
    //         echo ($value[3]) . '<br>';
    //     }

    // сделать вложенность
    // подключение через pdo c коммитом и без (autocommit, dbcommit, dbrollback) prepare, select * from table where id = :id sql инъекция
    // функция выполнения запроса в базу
    // singleton 
    // sql из отдельного файла
    // запрос через try catch (dbrollback)


    // 
    ?>
    <br>
    <form action="CRUD/create.php" method="post">
        <p>Родитель</p>
        <input type="text" name="parentID">
        <p>Новый элемент</p>
        <input type="text" name="childName"><br>
        <p>Тип элемента</p>
        <input type="text" name="childType"><br>
        <p><button type="sumbit">Добавить</button></p>
    </form><br>

    <form action="CRUD/update.php" method="post">
        <p>Название</p>
        <input type="text" name="updateId">
        <p>Новое название</p>
        <input type="text" name="newName"><br>
        <p><button type="sumbit">Изменить</button></p>
    </form><br>

    <form action="CRUD/delete.php" method="post">
        <p>Название</p>
        <input type="text" name="deleteId">
        <p><button type="sumbit">Удалить</button></p>
    </form>
    <form action="CRUD/recover.php">
        <p><button type="sumbit">Восстановить</button></p>
    </form>


</body>

</html>