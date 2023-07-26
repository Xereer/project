<?php

require_once('../connect.php');

$parent = $_POST['parent'];
$child = $_POST['child'];

$parent = mysqli_query($connect, query: "SELECT `id`, `typeID` FROM `university` WHERE `name` = '$parent'");
$parent = mysqli_fetch_row($parent);

if ($parent && $parent[1] <= 4 && $child) {
    $parentID = $parent[0];
    $childType = $parent[1] + 1;
    mysqli_query($connect, query: "INSERT INTO `university`(`id`, `parentID`, `typeID`, `name`, `isArchive`) VALUES (NULL,'$parentID','$childType','$child','0')");
}
header('Location: ../index.php');
