<?php

require_once 'connect.php';
$db = Database::getInstance();
$pdo = $db->getPDO();

$sql = file_get_contents (__DIR__.'/../sql/getNameAndId.sql');
$stmt = $pdo->query($sql);
$elem = $stmt->fetchAll(PDO::FETCH_ASSOC);

try {

    function read ($elem, $id)
    {
        $arr = array();
        foreach ($elem as $value) {
            if ($value['parentID'] === $id) {
                $child = read($elem, $value['id']);

                if (!empty($child)) {
                    $value['child'] = $child;
                }
                $arr[$value['id']] = array('id' => $value['id'], 'name' => $value['name'], 'child' => $child);
            }
        }
        return $arr;
    }
    $lego = json_encode(read($elem,0));

} catch (PDOException $exception) {
    echo "Error: {$exception->getMessage()}";
}

