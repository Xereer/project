<?php

function read($id){
    global $pdo;
    $sql = "SELECT id, name FROM university WHERE parentID = $id AND isArchive = 0";
    $stmt = $pdo->query($sql);
    $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($child);
    // die;
    foreach ($child as $value) {
        echo ($value['id'])." ".($value['name']). '<br>';
        read($value['id']);
    }
    
}

read (0);