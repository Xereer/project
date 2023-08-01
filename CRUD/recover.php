<?php

require_once('../connect.php');

try {
    $sql = "UPDATE university SET isArchive = 0";
    $stmt = $pdo->query($sql);

}catch(PDOException $exeption){
    echo "Error: {$exeption->getMessage()}";
}
header('Location: ../index.php');