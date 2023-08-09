<?php

require_once 'script.php';

try {
    $updatePropId = $_POST['UpdatePropId'];
    $newVal = $_POST['newVal'];

    checkVariables($updatePropId, $newVal);

    $sql = file_get_contents(__DIR__.'/../sql/updatePropById.sql');
    $params = [
        'id' => $updatePropId,
        'value' => $newVal
    ];
    executeSqlQuery($pdo,$sql,$params,false);
    header('Location: ../index.html');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}