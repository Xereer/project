<?php

$host = 'localhost';
$dbname = 'project';
$username = 'root';
$port = 3306;
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port;", $username);
} catch (PDOException $exeption) {
    echo "Error: {$exeption->getMessage()}";
}
