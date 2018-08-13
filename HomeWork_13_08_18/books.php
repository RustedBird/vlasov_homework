<?php

require_once 'classes.php';

$host = '127.0.0.1';
$db = 'books_db';
$user = 'root';
$pass = '';
$charset = 'utf8';

if (isset($_POST)) {
    try {
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $pdo = new PDO($dsn, $user, $pass, $opt);

        $stmt = $pdo->query('SELECT * FROM book');

        $allBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($allBooks as $key => $result) {
            $books[$key] = new $result['type']($result);
        }
        foreach ($books as $item) {
            $response .= $item->printInfo();
        }
        echo json_encode($response);
    } catch (PDOException $e) {
        echo json_encode("Подключение не удалось: " . $e->getMessage());
    }
}




