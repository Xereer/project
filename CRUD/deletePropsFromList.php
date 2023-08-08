<?php

require_once '../connect.php';

try {
    $deleteProps = $_POST['deleteProps'];
    $sql = file_get_contents (__DIR__.'/../sql/deletePropsFromList.sql');
    $stmt = $pdo->prepare($sql);
    $stmt ->execute([
        'id' => $deleteProps
    ]);
    header('Location: ../index.php');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
}