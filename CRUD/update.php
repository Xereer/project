<?php

require_once('../connect.php');

$updateId = $_POST['updateId'];
$newName = $_POST['newName'];

if ($name && $newName) {
    mysqli_query($connect, query: "UPDATE `university` SET `name`='$newName' WHERE `name` = '$name'");
    echo 'Success';
}


header('Location: ../index.php');
?>
