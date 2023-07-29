<?php

require_once('../connect.php');

$updateId = $_POST['updateId'];
$newName = $_POST['newName'];

// update по id
// менять только активные
// Добавить try catch
try{
    $sql = "UPDATE university SET name = :name WHERE id = :id AND isArchive = 0";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $updateId,
        'name' => $newName
    ]);
}catch(PDOException $exeption){
    echo "Error: {$exeption->getMessage()}";
}


header('Location: ../index.php');
?>
