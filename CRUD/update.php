<?php


require_once 'script.php';


try {
    $updateId = $_POST['updateId'];
    $newName = $_POST['newName'];

    checkVariables($updateId, $newName);

    $sql = file_get_contents (__DIR__.'/../sql/getIsArchive.sql');
    $params = [
        'id' => $updateId
    ];
    $isArchive = executeSqlQuery($pdo,$sql,$params,true)[0];
    if ($isArchive['isArchive'] === 1) {
        throw new Exception('Элемент удален');
    }
    $sql = file_get_contents(__DIR__.'/../sql/updateElement.sql');
    $params = [
        'id' => $updateId,
        'name' => $newName
    ];
    executeSqlQuery($pdo,$sql,$params,false);
    header('Location: ../index.html');

} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}
