<?php

require_once 'script.php';

try {
    $sql = file_get_contents (__DIR__.'/../sql/recover.sql');
    $stmt = $pdo->query($sql);

}catch(PDOException $exception){
    echo "Error: {$exception->getMessage()}";
}
header('Location: ../index.html');