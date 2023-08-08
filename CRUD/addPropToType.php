<?php

require_once '../connect.php';

try {
    $type = $_POST['type'];
    $property = $_POST['property'];

    $sql = file_get_contents(__DIR__.'/../sql/addPropToType.sql');
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id_prop' => $property,
        'typeId' => $type
    ]);
    header('Location: ../index.php');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
}
