<?php

require_once '../connect.php';
require_once '../emptyCheck.php';

try {
    $name = $_POST['name'];
    $alias = $_POST['alias'];
    checkVariables($name, $alias);

    $sql = file_get_contents(__DIR__.'/../sql/addNewPropsToList.sql');
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'alias' => $alias
    ]);
    header('Location: ../index.php');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}

