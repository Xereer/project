<?php

require_once('../connect.php');

$name = $_POST['name'];
$newName = $_POST['newName'];

if ($name && $newName) {
    mysqli_query($connect, query: "UPDATE `university` SET `name`='$newName' WHERE `name` = '$name'");
}
header('Location: ../index.php');
?>
