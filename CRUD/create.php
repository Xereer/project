<?php

require_once('../connect.php');

$parentID = $_POST['parentID'];
$childType = $_POST['childType'];
$childName = $_POST['childName'];

// отправлять childType (это фронт отправляет) + проверка !!!! еще try catch

if ($parent && $parent[1] <= 4 && $child) {
    $parentID = $parent[0];
    $childType = $parent[1] + 1;
    mysqli_query($connect, query: "INSERT INTO `university`(`id`, `parentID`, `typeID`, `name`, `isArchive`) VALUES (NULL,'$parentID','$childType','$child','0')");
    echo "Success";
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
