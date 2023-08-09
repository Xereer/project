<?php

require_once 'script.php';

try {
    $type = $_POST['type'];
    $property = $_POST['property'];

    checkVariables($type, $property);

    $sql = file_get_contents(__DIR__.'/../sql/deletePropToType.sql');
    $params = [
        'id_prop' => $property,
        'typeId' => $type
    ];
    executeSqlQuery($pdo,$sql,$params,false);
    header('Location: ../index.html');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}