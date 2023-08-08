<?php

require_once '../connect.php';


try {
    $updatePropId = $_POST['UpdatePropId'];
    $newVal = $_POST['newVal'];

    $sql = file_get_contents(__DIR__.'/../sql/updatePropById.sql');
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $updatePropId,
        'value' => $newVal
    ]);
    header('Location: ../index.php');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
}