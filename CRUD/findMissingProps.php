<?php

require_once 'script.php';

try {
    $id = $_POST['propMissId'];

    $sql = file_get_contents (__DIR__ . '/../sql/getMissingProps.sql');
    $params = [
        'id' => $id
    ];
    $propsValues = executeSqlQuery($pdo,$sql,$params,true);;

    $properties = array();

    foreach ($propsValues as $value) {
        $properties[$value['id']] = $value['alias'];
    }
    session_start();
    $_SESSION['missingProperties'] = $properties;
//    var_dump($properties);
    header('Location: ../index.html');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}