<?php

require_once 'script.php';

try {
    $deleteId = $_POST['deleteId'];
    checkVariables($deleteId);

    $pdo->beginTransaction();
    delete($deleteId);
    $pdo->commit();
    header('Location: ../index.html');
} catch (PDOException $exception) {
    $pdo->rollBack();
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}

function delete($parentId)
{
    global $pdo;
    $sql = file_get_contents (__DIR__.'/../sql/getIdByParentId.sql');
    $params = [
        'parentID' => $parentId
    ];
    $child = executeSqlQuery($pdo,$sql,$params,true);
    foreach ($child as $value) {
        delete($value['id']);
    }
    $sql = file_get_contents (__DIR__.'/../sql/deleteElement.sql');
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $parentId
    ]);
}
?>