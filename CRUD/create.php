<?php


require_once('../connect.php');
$db = Database::getInstance();
$pdo = $db->getPDO();

$parentID = $_POST['parentID'];
$childType = $_POST['childType'];
$childName = $_POST['childName'];

try {
    $sql = file_get_contents(__DIR__.'/../sql/getIdAndTypeId.sql');
    $stmt = $pdo->prepare($sql);
    $stmt ->execute([
        'id' => $parentID
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($parentID) && $user['typeID'] + 1 != $childType) {
        throw new Exception('ошибка заполнения');
    }
    $sql = file_get_contents(__DIR__.'/../sql/addNewElement.sql');
    $stmt = $pdo->prepare($sql);
    $stmt -> execute([
        'parentID' => $parentID,
        'typeID' => $childType,
        'name' => $childName
    ]);

    header('Location: ../index.php');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $exception) {
    echo "Error: {$exception->getMessage()}";
    echo "{$exception->getTraceAsString()}";
}

// проверка введенных значений, исправить фронт
