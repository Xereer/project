<?php

require_once('../connect.php');

$parentID = $_POST['parentID'];
$childType = $_POST['childType'];
$childName = $_POST['childName'];



try{
    $sql = "SELECT id, typeID FROM university WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt ->execute([
        'id' => $parentID
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user || $user['typeID'] + 1 != $childType){
        echo 'Error';
        die;
    }
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