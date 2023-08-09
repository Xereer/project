<?php

require_once '../connect.php';
require_once '../emptyCheck.php';

try {
    $type = $_POST['type'];
    $property = $_POST['property'];

    checkVariables($type, $property);

    $sql = file_get_contents(__DIR__.'/../sql/deletePropToType.sql');
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id_prop' => $property,
        'typeId' => $type
    ]);
    header('Location: ../index.php');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}