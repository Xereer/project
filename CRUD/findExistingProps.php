<?php

require_once '../connect.php';

$db = Database::getInstance();
$pdo = $db->getPDO();

try {
    $id = $_POST['propId'];

    $sql = file_get_contents (__DIR__ . '/../sql/getExistingProps.sql');
    $stmt = $pdo->prepare($sql);
    $stmt ->execute([
        'id' => $id
    ]);
    $propsValues = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $properties = array();

    foreach ($propsValues as $value) {
        $properties[$value['id']] = $value['alias'];
    }
    session_start();
    $_SESSION['existingProperties'] = $properties;
//    var_dump($properties);
    header('Location: ../index.php');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}