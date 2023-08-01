<?php

require_once('../connect.php');
$deleteId = $_POST['deleteId'];

try {
    $pdo->beginTransaction();
    $sql = "SELECT id FROM university WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt ->execute([
        'id' => $deleteId
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user){
        echo 'Error';
        die;
    }
    $parentId = $user['id'];

    function delete($parentId)
    {    
        $db = Database::getInstance();
        $pdo = $db->getPDO();
        $sql = "SELECT id FROM university WHERE parentID = $parentId";
        $stmt = $pdo->query($sql);
        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($child as $value) {
            delete($value['id']);
        }
        $sql = "UPDATE university SET isArchive = 1 WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $parentId
        ]);
    }

    delete($parentId);
    $pdo->commit();
    header('Location: ../index.php');
}catch(PDOException $exeption){
    $pdo->rollBack();
    echo "Error: {$exeption->getMessage()}";
}

?>