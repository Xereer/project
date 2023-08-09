<?php

require_once '../connect.php';
require_once '../emptyCheck.php';
$db = Database::getInstance();
$pdo = $db->getPDO();

try {
    $deleteId = $_POST['deleteId'];
    checkVariables($deleteId);
    function delete($parentId)
    {
        global $pdo;
        $sql = file_get_contents (__DIR__.'/../sql/getIdByParentId.sql');
        $stmt = $pdo->prepare($sql);
        $stmt ->execute([
            'parentID' => $parentId
        ]);
        $child = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($child as $value) {
            delete($value['id']);
        }
        $sql = file_get_contents (__DIR__.'/../sql/deleteElement.sql');
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $parentId
        ]);
    }
    $pdo->beginTransaction();
    delete($deleteId);
    $pdo->commit();
    header('Location: ../index.php');
} catch (PDOException $exception) {
    $pdo->rollBack();
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}

?>