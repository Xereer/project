<?php

class Database {
    private static $instance;
    private $pdo;

    private function __construct()
    {
        $host = 'localhost';
        $dbname = 'project';
        $username = 'root';
        $port = 3306;

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port;", $username);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec('SET NAMES UTF8');
        } catch (PDOException $exception) {
            echo "Error: {$exception->getMessage()}";
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}
$db = Database::getInstance();
$pdo = $db->getPDO();

function executeSqlQuery($pdo, $sql, $params, $fetch = true) {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    if ($fetch) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return $stmt;
    }
}

function checkVariables(...$variables) {
    foreach ($variables as $variable) {
        if (empty($variable)) {
            throw new Exception("Ошибка: Поле не должно быть пустым.");
        }
    }
}