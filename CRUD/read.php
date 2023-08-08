<?php

require_once 'connect.php';
//require_once 'CRUD/properties.php';
$db = Database::getInstance();
$pdo = $db->getPDO();

try {
    $sql = file_get_contents (__DIR__.'/../sql/getNameAndId.sql');
    $stmt = $pdo->query($sql);
    $elem = $stmt->fetchAll(PDO::FETCH_ASSOC);
    function getProperties($id)
    {
        $db = Database::getInstance();
        $pdo = $db->getPDO();

        $sql = file_get_contents (__DIR__ . '/../sql/getPropertiesById.sql');
        $stmt = $pdo->prepare($sql);
        $stmt ->execute([
            'id' => $id
        ]);
        $propsValues = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $properties = array();

        foreach ($propsValues as $value) {
            $properties[$value['alias']] = $value['value'];
        }
        return $properties;
    }

    function read ($elem, $id)
    {
        $arr = array();
        foreach ($elem as $value) {
            if ($value['parentID'] === $id) {
                $child = read($elem, $value['id']);

                if (!empty($child)) {
                    $value['child'] = $child;
                }
                $arr[] = array('id' => $value['id'], 'name' => $value['name'],...getProperties($value['id']), 'child' => $child);
            }
        }
        return $arr;
    }

    $lego = json_encode(read($elem,0));

} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
}