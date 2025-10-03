<?php
$host = 'mysql';
$db = getenv('MYSQL_DATABASE') ?: 'meubanco';
$user = getenv('MYSQL_USER') ?: 'todo';
$pass = getenv('MYSQL_PASSWORD') ?: 'to.do';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
