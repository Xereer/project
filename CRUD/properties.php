<?php

require_once '../connect.php';
$id = $_POST['elemId'];

$db = Database::getInstance();
$pdo = $db->getPDO();

try {
    $sql = file_get_contents (__DIR__ . '/../sql/getPropertiesById.sql');
    $stmt = $pdo->prepare($sql);
    $stmt ->execute([
        'id' => $id
    ]);
    $propsValues = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $properties = array();

    foreach ($propsValues as $value) {
        $properties[$value['id']] = $value['alias'];
    }
    session_start();
    $_SESSION['properties'] = $properties;
//    var_dump($properties);
    header('Location: ../index.php');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
}

// по id получить элемент, в выпадающем списке его свойства после выбора свойства удалить или редактировать
// для добавления в выпадающем списке только разрешенные свойства из таблицы для данного типа