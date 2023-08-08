<?php

require_once '../connect.php';

try {
    $delPropId = $_POST['delPropId'];
    $sql = file_get_contents(__DIR__.'/../sql/deletePropById.sql');
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $delPropId
    ]);
    header('Location: ../index.php');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
}