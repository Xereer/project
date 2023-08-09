<?php

require_once 'script.php';

try {
    $deleteProps = $_POST['deleteProps'];

    checkVariables($deleteProps);

    $sql = file_get_contents (__DIR__.'/../sql/deletePropsFromList.sql');
    $params = [
        'id' => $deleteProps
    ];
    executeSqlQuery($pdo,$sql,$params,false);
    header('Location: ../index.html');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}