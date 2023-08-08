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
    <hr>
    <form method="post" action="CRUD/properties.php">
        <label for="inputId">id элемента:</label>
        <input type="text" name="elemId">
        <input type="submit" value="Поиск">
    </form>
    <br>

    <form method="post" action="CRUD/deleteProps.php">
        <select id="propertySelect" name="delPropId">
            <?php
            session_start();
            if (isset($_SESSION['properties']) && !empty($_SESSION['properties'])) {
                foreach ($_SESSION['properties'] as $key => $value) {
                    echo '<option value="' . $key . '">' . $value . '</option>';
                }
            } else {
                echo '<option value="-1">Нет доступных свойств</option>';
            }
            ?>
        </select>
        <button type="sumbit">Удалить свойство</button>
    </form>
    <br>
    <form method="post" action="CRUD/updateProps.php">
        <select id="propertySelect" name="UpdatePropId">
            <?php
            session_start();
            if (isset($_SESSION['properties']) && !empty($_SESSION['properties'])) {
                foreach ($_SESSION['properties'] as $key => $value) {
                    echo '<option value="' . $key . '">' . $value . '</option>';
                }
            } else {
                echo '<option value="-1">Нет доступных свойств</option>';
            }
            ?>
        </select>
        <input type="text" name="newVal">
        <button type="sumbit">Изменить свойство</button>
    </form>
    <br>
    <form method="post" action="CRUD/getAllowProps.php">
        <label for="inputId">id элемента:</label>
        <input type="text" name="elemId">
        <input type="submit" value="Поиск">
    </form>
    <br>
    <form method="post" action="CRUD/createProps.php">
        <select id="propertySelect" name="createPropId">
            <?php
            session_start();
            if (isset($_SESSION['allowProperties']) && !empty($_SESSION['allowProperties'])) {
                foreach ($_SESSION['allowProperties'] as $key => $value) {
                    echo '<option value="' . $key . '">' . $value . '</option>';
                }
            } else {
                echo '<option value="-1">Нет доступных свойств</option>';
            }
            ?>
        </select>

        <input type="text" name="value">
        <button type="sumbit">Добавить свойство</button>
    </form>
    <br>
    <hr>
    <form method="post" action="CRUD/deletePropsFromList.php">
        <select id="propertySelect" name="deleteProps">
            <?php
            session_start();
            if (isset($_SESSION['currentProps']) && !empty($_SESSION['currentProps'])) {
                foreach ($_SESSION['currentProps'] as $key => $value) {
                    echo '<option value="' . $key . '">' . $value . '</option>';
                }
            } else {
                echo '<option value="-1">Нет доступных свойств</option>';
            }
            ?>
        </select>
        <button type="sumbit">Удалить свойство из справочника</button>
    </form>
    <form method="post" action="CRUD/recoverPropsToList.php">
        <select id="propertySelect" name="recoverProps">
            <?php
            session_start();
            if (isset($_SESSION['deletedProps']) && !empty($_SESSION['deletedProps'])) {
                foreach ($_SESSION['deletedProps'] as $key => $value) {
                    echo '<option value="' . $key . '">' . $value . '</option>';
                }
            } else {
                echo '<option value="-1">Нет доступных свойств</option>';
            }
            ?>
        </select>
        <button type="sumbit">Восстановить свойства</button>
    </form>
    <form action="CRUD/getAllProps.php">
        <button type="sumbit">Обновить</button>
    </form>
    <br>
    <form method="post" action="CRUD/addNewPropToList.php">
        <label for="inputId">Псевдоним</label>
        <input type="text" name="alias">
        <label for="inputId">Название</label>
        <input type="text" name="name">
        <button type="sumbit">Добавить</button>
    </form>
    <br>
    <form method="post" action="CRUD/addPropToType.php">
        <label for="inputId">Тип</label>
        <select id="propertySelect" name="type">
            <option value="1">Университет</option>
            <option value="2">Факультет</option>
            <option value="3">Кафедра</option>
            <option value="4">Группа</option>
            <option value="5">Студент</option>
        </select>
        <label for="inputId">Свойство</label>
        <select id="propertySelect" name="property">
            <?php
            session_start();
            if (isset($_SESSION['currentProps']) && !empty($_SESSION['currentProps'])) {
                foreach ($_SESSION['currentProps'] as $key => $value) {
                    echo '<option value="' . $key . '">' . $value . '</option>';
                }
            } else {
                echo '<option value="-1">Нет доступных свойств</option>';
            }
            ?>
        </select>
        <button type="sumbit">Добавить свойство для типа</button>
    </form>
    <form method="post" action="CRUD/deletePropToType.php">
        <label for="inputId">Тип</label>
        <select id="propertySelect" name="type">
            <option value="1">Университет</option>
            <option value="2">Факультет</option>
            <option value="3">Кафедра</option>
            <option value="4">Группа</option>
            <option value="5">Студент</option>
        </select>
        <label for="inputId">Свойство</label>
        <select id="propertySelect" name="property">
            <?php
            session_start();
            if (isset($_SESSION['currentProps']) && !empty($_SESSION['currentProps'])) {
                foreach ($_SESSION['currentProps'] as $key => $value) {
                    echo '<option value="' . $key . '">' . $value . '</option>';
                }
            } else {
                echo '<option value="-1">Нет доступных свойств</option>';
            }
            ?>
        </select>
        <button type="sumbit">Убать свойство у типа</button>
    </form>
    <form method="post" action="CRUD/recoverPropToType.php">
        <label for="inputId">Тип</label>
        <select id="propertySelect" name="type">
            <option value="1">Университет</option>
            <option value="2">Факультет</option>
            <option value="3">Кафедра</option>
            <option value="4">Группа</option>
            <option value="5">Студент</option>
        </select>
        <label for="inputId">Свойство</label>
        <select id="propertySelect" name="property">
            <?php
            session_start();
            if (isset($_SESSION['currentProps']) && !empty($_SESSION['currentProps'])) {
                foreach ($_SESSION['currentProps'] as $key => $value) {
                    echo '<option value="' . $key . '">' . $value . '</option>';
                }
            } else {
                echo '<option value="-1">Нет доступных свойств</option>';
            }
            ?>
        </select>
        <button type="sumbit">Вернуть свойство у типа</button>
    </form>

    <hr>

    <form action="CRUD/create.php" method="post">
        <p>id родителя</p>
        <input type="text" name="parentID">
        <p>Новый элемент</p>
        <input type="text" name="childName"><br>
        <p>Тип элемента</p>
        <select id="propertySelect" name="childType">
            <option value="1">Университет</option>
            <option value="2">Факультет</option>
            <option value="3">Кафедра</option>
            <option value="4">Группа</option>
            <option value="5">Студент</option>
        </select>
        <p><button type="sumbit">Добавить</button></p>
    </form>

    <hr>

    <form action="CRUD/update.php" method="post">
        <p>id названия</p>
        <input type="text" name="updateId">
        <p>Новое название</p>
        <input type="text" name="newName"><br>
        <p><button type="sumbit">Изменить</button></p>
    </form>

    <hr>

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