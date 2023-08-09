<?php

require_once 'script.php';

try {
    $recoverProps = $_POST['recoverProps'];
    $sql = file_get_contents (__DIR__.'/../sql/recoverPropsToList.sql');
    $params = [
        'id' => $recoverProps
    ];
    executeSqlQuery($pdo,$sql,$params,false);
    header('Location: ../index.html');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
}