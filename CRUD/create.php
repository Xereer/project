<?php

require_once 'script.php';

$parentID = $_POST['parentID'];
$childType = $_POST['childType'];
$childName = $_POST['childName'];

try {
    checkVariables($childType, $childName);

    $sql = file_get_contents(__DIR__.'/../sql/getIdAndTypeId.sql');
    $params = [
        'id' => $parentID
    ];
    $user = executeSqlQuery($pdo,$sql,$params, true)[0];

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

    header('Location: ../index.html');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}

// проверка введенных значений, исправить фронт
