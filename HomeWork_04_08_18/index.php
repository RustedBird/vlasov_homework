<?php

$host = '127.0.0.1';
$db   = 'lesson8_db';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    ];

    $pdo = new PDO($dsn, $user, $pass, $opt);

    //    Используя *PDO* обновить первых двух студентов. Например: измените им возраст
    $result = $pdo->query("UPDATE Student SET age = 100");

//    Используя *PDO* удалите одного из студентов
    $result = $pdo->query("DELETE FROM Student WHERE id = 2");

//    PDO::quote
    $sql = 'SELECT * FROM student';
    $result = $pdo->query($sql);

    var_dump($result->fetchAll(PDO::FETCH_ASSOC));

//    PDO::prepare + PDO::execute
    $sql = "SELECT * FROM student";
    $result = $pdo->prepare($sql);

    $result->execute();
    var_dump($result->fetchAll(PDO::FETCH_ASSOC));

} catch(PDOException $e) {
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home work DB PDO</title>
</head>
<body>

</body>
</html>
