<?php

require_once 'connect.php';

try{
    $pdo->beginTransaction();
    function read($id) {
        $db = Database::getInstance();
        $pdo = $db->getPDO();
    
        $sql = "SELECT id, name FROM university WHERE parentID = $id AND isArchive = 0";
        $stmt = $pdo->query($sql);
        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($child as $value) {
            echo ($value['id']) . " " . ($value['name']) . '<br>';
            read($value['id']);
        }
    }
    $pdo->commit();

}catch(PDOException $exeption){
    $pdo->rollBack();
    echo "Error: {$exeption->getMessage()}";
}

read (0);