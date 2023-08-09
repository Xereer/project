<?php

require_once 'script.php';

try {
    $id = $_POST['elemId'];

    checkVariables($id);

    $sql = file_get_contents (__DIR__ . '/../sql/getAllowPropsByElemId.sql');
    $params = [
        'id' => $id
    ];
    $propsValues = executeSqlQuery($pdo,$sql,$params,true);;

    $allowProperties = array();

    foreach ($propsValues as $value) {
        $allowProperties[$value['id']] = $value['alias'];
    }
    session_start();
    $_SESSION['allowProperties'] = $allowProperties;
    $_SESSION['id'] = $id;
//    var_dump($allowProperties);
    header('Location: ../index.html');
} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
} catch (Exception $e) {
    echo "Error: {$e->getMessage()}";
}