<?php

require_once('../connect.php');

$parentID = $_POST['parentID'];
$childType = $_POST['childType'];
$childName = $_POST['childName'];

// отправлять childType (это фронт отправляет) + проверка !!!! еще try catch
try{
    $sql = "INSERT INTO university(id, parentID, typeID, name, isArchive) VALUES (:id, :parentID, :typeID, :name, :isArchive)";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute([
        'id' => NULL,
        'parentID' => $parentID,
        'typeID' => $childType,
        'name' => $childName,
        'isArchive' => 0
    ]);
}catch(PDOException $exeption){
    echo "Error: {$exeption->getMessage()}";
}

header('Location: ../index.php');
