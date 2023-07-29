<?php

require_once('../connect.php');

$parentID = $_POST['parentID'];
$childType = $_POST['childType'];
$childName = $_POST['childName'];

// отправлять childType (это фронт отправляет) + проверка !!!! еще try catch

$sql = "SELECT name, typeID FROM university WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt ->execute([
    'id' => $parentID
]);
$parent = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($parent['name']);
try{
    $sql = "SELECT name, typeID FROM university WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt ->execute([
    'id' => $parentID
]);
$parent = $stmt->fetch(PDO::FETCH_ASSOC);
}catch(PDOException $exeption){
    echo "Error: {$exeption->getMessage()}";
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

header('Location: ../index.php');
