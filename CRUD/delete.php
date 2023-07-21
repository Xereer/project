<?php

require_once('../connect.php');

$deleteName = $_POST['deleteName'];

$id = mysqli_query($connect, query: "SELECT `id` FROM `university` WHERE `name` = '$deleteName'");
$id = mysqli_fetch_row($id)[0];

function delete($parentId, $connect)
{
    mysqli_query($connect, "UPDATE university SET isArchive = '1' WHERE id = '$parentId'");
    $child = mysqli_query($connect, query: "SELECT `id` FROM `university` WHERE `parentID` = '$parentId'");
    $child = mysqli_fetch_all($child);
    foreach ($child as $value) {
        delete($value[0], $connect);
    }
}

delete($id, $connect);
header('Location: ../index.php');
?>