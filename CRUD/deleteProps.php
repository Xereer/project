<?php

require_once 'script.php';

try {
    $delPropId = $_POST['delPropId'];

    checkVariables($delPropId);

    $sql = file_get_contents(__DIR__.'/../sql/deletePropById.sql');
    $params = [
        'id' => $delPropId
    ];
    executeSqlQuery($pdo,$sql,$params,false);

    header('Location: ../index.html');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}