<?php

require_once 'script.php';

try {
    $name = $_POST['name'];
    $alias = $_POST['alias'];
    checkVariables($name, $alias);

    $sql = file_get_contents(__DIR__.'/../sql/addNewPropsToList.sql');
    $params = [
        'name' => $name,
        'alias' => $alias
    ];
    executeSqlQuery($pdo, $sql, $params, false);

    header('Location: ../index.html');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}

