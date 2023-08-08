<?php

require_once '../connect.php';

try {
    $sql = file_get_contents (__DIR__ . '/../sql/getAllProps.sql');
    $stmt = $pdo->query($sql);
    $elem = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $currentProps = array();
    $deletedProps = array();

    foreach ($elem as $value) {
        if ($value['isArchive'] == 0) {
            $currentProps[$value['id']] = $value['alias'];
        } else {
            $deletedProps[$value['id']] = $value['alias'];
        }
    }
    session_start();
    $_SESSION['currentProps'] = $currentProps;
    $_SESSION['deletedProps'] = $deletedProps;
//    var_dump($deletedProps);
    header('Location: ../index.php');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
}

//var_dump($deletedProps);