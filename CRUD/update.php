<?php


require_once '../connect.php';
require_once '../emptyCheck.php';
$db = Database::getInstance();
$pdo = $db->getPDO();


try {
    $updateId = $_POST['updateId'];
    $newName = $_POST['newName'];

    checkVariables($updateId, $newName);

    $sql = file_get_contents (__DIR__.'/../sql/getIsArchive.sql');
    $stmt = $pdo->prepare($sql);
    $stmt ->execute([
        'id' => $updateId
    ]);
    $isArchive = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($isArchive['isArchive'] === 1) {
        throw new Exception('Элемент удален');
    }
    $sql = file_get_contents(__DIR__.'/../sql/updateElement.sql');
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $updateId,
        'name' => $newName
    ]);

} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}
header('Location: ../index.php');