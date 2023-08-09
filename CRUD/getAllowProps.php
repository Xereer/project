<?php

require_once '../connect.php';
require_once '../emptyCheck.php';

$db = Database::getInstance();
$pdo = $db->getPDO();

try {
    $id = $_POST['elemId'];

    checkVariables($id);

    $sql = file_get_contents (__DIR__ . '/../sql/getAllowPropsByElemId.sql');
    $stmt = $pdo->prepare($sql);
    $stmt ->execute([
        'id' => $id
    ]);
    $propsValues = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    var_dump($propsValues);

    $allowProperties = array();

    foreach ($propsValues as $value) {
        $allowProperties[$value['id']] = $value['alias'];
    }
    session_start();
    $_SESSION['allowProperties'] = $allowProperties;
    $_SESSION['id'] = $id;
//    var_dump($allowProperties);
    header('Location: ../index.php');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}