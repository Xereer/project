<?php

require_once '../connect.php';

try {
    $recoverProps = $_POST['recoverProps'];
    $sql = file_get_contents (__DIR__.'/../sql/recoverPropsToList.sql');
    $stmt = $pdo->prepare($sql);
    $stmt ->execute([
        'id' => $recoverProps
    ]);
    header('Location: ../index.php');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
}