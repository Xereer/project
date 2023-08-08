<?php

require_once '../connect.php';


try {
    session_start();
    $createPropId = $_POST['createPropId'];
    $value = $_POST['value'];
    $id = $_SESSION['id'];

    $sql = file_get_contents(__DIR__.'/../sql/createProp.sql');
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'propId' => $createPropId,
        'value' => $value,
        'id_univ' => $id
    ]);
    header('Location: ../index.php');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
}