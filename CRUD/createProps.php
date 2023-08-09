<?php

require_once 'script.php';

try {
    session_start();
    $createPropId = $_POST['createPropId'];
    $value = $_POST['value'];
    $id = $_SESSION['id'];

    checkVariables($createPropId, $value, $id);

    $sql = file_get_contents(__DIR__.'/../sql/createProp.sql');
    $params = [
        'propId' => $createPropId,
        'value' => $value,
        'id_univ' => $id
    ];
    executeSqlQuery($pdo,$sql,$params,false);
    header('Location: ../index.html');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}