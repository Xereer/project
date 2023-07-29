<?php

require_once('../connect.php');

$sql = "UPDATE university SET isArchive = 0";
$stmt = $pdo->query($sql);

header('Location: ../index.php');