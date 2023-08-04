<?php

//require_once '../connect.php';

function getProperties($id)
{
    $db = Database::getInstance();
    $pdo = $db->getPDO();

    $sql = file_get_contents (__DIR__ . '/../sql/getPropertiesById.sql');
    $stmt = $pdo->prepare($sql);
    $stmt ->execute([
        'id' => $id
    ]);
    $propsValues = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $properties = array();

    foreach ($propsValues as $value) {
        $properties[$value['alias']] = $value['value'];
    }
    return $properties;
}
//var_dump(getProperties(9));

// по id получить элемент, в выпадающем списке его свойства после выбора свойства удалить или редактировать
// для добавления в выпадающем списке только разрешенные свойства из таблицы для данного типа