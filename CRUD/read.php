<?php

$sql = "SELECT * FROM `university` WHERE `isArchive` = '0'";
$stmt = $pdo->query($sql);

while ($name = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo ($name['id'])." ".($name['name']). '<br>';
}