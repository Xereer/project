<?php

require_once 'script.php';

try {
    $id = $_POST['propId'];

    $sql = file_get_contents (__DIR__ . '/../sql/getExistingProps.sql');
    $params = [
        'id' => $id
    ];
    $propsValues = executeSqlQuery($pdo,$sql,$params,true);;

    $properties = array();

    foreach ($propsValues as $value) {
        $properties[$value['id']] = $value['alias'];
    }
    session_start();
    $_SESSION['existingProperties'] = $properties;
//    var_dump($properties);
    header('Location: ../index.html');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}