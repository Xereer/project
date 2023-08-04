<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <pre id="lego"></pre>
    <script>
        <?php

//        require_once 'startTable.php';
        require_once 'CRUD/read.php';
//        require_once 'propsTables.php';
        ?>
        let jsonData = <?php echo $lego; ?>;
        document.getElementById("lego").innerHTML = (JSON.stringify(jsonData,null,4));
    </script>
    <hr><br>
    <form action="CRUD/create.php" method="post">
        <p>id родителя</p>
        <input type="text" name="parentID">
        <p>Новый элемент</p>
        <input type="text" name="childName"><br>
        <p>Тип элемента</p>
        <input type="text" name="childType"><br>
        <p><button type="sumbit">Добавить</button>
    </form><hr><br>

    <form action="CRUD/update.php" method="post">
        <p>id названия</p>
        <input type="text" name="updateId">
        <p>Новое название</p>
        <input type="text" name="newName"><br>
        <p><button type="sumbit">Изменить</button></p>
    </form><hr><br>

    <form action="CRUD/delete.php" method="post">
        <p>id</p>
        <input type="text" name="deleteId">
        <p><button type="sumbit">Удалить</button></p>
    </form>
    <form action="CRUD/recover.php">
        <p><button type="sumbit">Восстановить</button></p>
    </form>


</body>

</html>