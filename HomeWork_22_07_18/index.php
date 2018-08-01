<?php

include 'logics.php';

setcookie('lastVisit', date("Y-m-d h:i:sa"));
if (isset($_COOKIE['counter'])) {
    $a = $_COOKIE['counter'];
} else {
    $a = 0;
}
setcookie('counter', ++$a);

/*Задача 1:
 Создайте переменную $name и присвойте ей строковое значение содержащее ваше имя
 Создайте переменную $age и присвойте ей числовое значение
 Выведите: Меня зовут: "ваше имя"
 Выведите: Мой "ваш возраст" лет*/

$name = 'Philipp';
$age = 28;

echo "Меня зовут $name<br>";
echo "Мой возраст $age лет<br>";
echo '<hr>';


/*Задача 2:
 Создайте константу и присвойте ей значение
 Проверьте существует ли константа.
Выведите значение константы
 Попытайтесь изменить ее значение.*/

define('AAA', 'random value');

if (defined('AAA')){
    echo 'Constant exists<br>';
} else {
    echo 'Constant is not defined<br>';
}

echo AAA;

//AAA = 10;
echo '<hr>';


/*Задача 3:
 Создайте переменную $age и присвойте ей значение
- Напишите конструкцию if, которая выводит фразу:
 "Вам еще работать и работать" при условии что $age попадает в диапазон чисел от 18 до 59 (включительно)
- Расширьте конструкцию if, выводя фразу: "Вам пора на пенсию" при условии, что $age больше 59
- Если $age от 1 до 17 то выводите вам еще рано работать*/

$age = 30;

if ($age >= 18 && $age <= 59) {
    echo 'Вам еще работать и работать<br>';
} elseif ($age > 59) {
    echo 'Вам пора на пенсию<br>';
} elseif ($age >= 1 && $age <= 17) {
    echo 'Вам еще рано работать';
}
echo '<hr>';


/*Задача 4:
 Создайте переменную $day и присвойте ей числовое значение
 С помощью конструкции switch выведите фразу "Это рабочий день если $day от 1-5
 Если 6-7 "Это выходной день"
 Если переменная $day не попадает в диапазон выводить неизвестный день*/

$day = 6;

switch ($day) {
    case 1:
        echo 'Это рабочий день';
        break;
    case 2:
        echo 'Это рабочий день';
        break;
    case 3:
        echo 'Это рабочий день';
        break;
    case 4:
        echo 'Это рабочий день';
        break;
    case 5:
        echo 'Это рабочий день';
        break;
    case 6:
        echo 'Это выходной день';
        break;
    case 7:
        echo 'Это выходной день';
        break;
    default:
        echo 'Неизвестный день';
        break;
}
echo '<hr>';


/*Задача 5:
 Вывести все числа, меньшие 10000, у которых есть хотя бы одна цифра 3 и которые не делятся на 5*/

$numbers = range(0, 1000);
foreach($numbers as $value) {
    if (strpos($value, '3') !== false && $value % 5) {
        echo "$value, ";
    }
}
echo '<hr>';


/*Задача 6:
 Использую куки выводите информацию о количестве посещений и дате последнего посещения.*/

if(isset($_COOKIE['lastVisit'])) {
    echo 'Последний визит ' . $_COOKIE['lastVisit'] . '<br>';
} else {
    echo 'Это ваш первый визит<br>';
}

echo "Количество посещений $a";
echo '<hr>';


/*Задача 7:
 Создайте в сессии массив для хранения всех посещенных страниц.
Выведите в цикле список всех посещенных страниц.*/

var_dump($_SESSION);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="testpage1.php">Test page 1</a>

</body>
</html>

<?php

echo '<hr>';

/*Задача 8:
 Создайте файл 'test.txt' и запишите в него массив ['name' => 'Your name', 'age' => 'Your age'].
 Считайте данные из файла 'test.txt' и выведите их на экран.*/

$array = ['name' => 'Your name', 'age' => 'Your age'];

file_put_contents('test.txt',serialize($array));

var_dump(unserialize(file_get_contents('test.txt')));
echo '<hr>';


/*Задача 9:
 Даны два упорядоченных по возрастанию массива. Образовать из этих двух массивов единый упорядоченный по возрастанию массив.*/

$array1 = range(20, 50, 3);
$array2 = range(5, 10, 1);

$newArray = array_merge($array1, $array2);
asort($newArray);
var_dump($newArray);
echo '<hr>';


/*Задача 10:
 Написать функцию сортировки пузырьком, с возможностью доп. фильтрации результатов с помощью callback функции*/

$array = array(1, 0, 6, 9, 4, 5, 2, 3, 8, 7); // исходный массив

function bubbleSort(array $numbers, callable $callback = NULL) { // сортировка пузырьком
    for ($i = 0; $i < count($numbers) - 1; $i++) {
        foreach ($numbers as $key => $value) {
            if ($numbers[$key] > $numbers[$key + 1] && $numbers[$key + 1] !== NULL) { // если текуший элемент больше следующего и следующий существует
                $tmp_var = $numbers[$key + 1];
                $numbers[$key + 1] = $numbers[$key]; // меняем элементы местами
                $numbers[$key] = $tmp_var;
            }
        }
    }
    if ($callback) {
        $numbers = call_user_func($callback, $numbers); // если есть коллбэк, то выполняем эту функцию
    }
    return $numbers;
};

$newArray = bubbleSort($array, function ($item) { // новый массив
    $result = [];
    foreach ($item as $value) {
        if (!($value % 2) && $value > 0) { // выводим все положительные четные элементы
            $result[] = $value;
        }
    }
    return $result;
});

echo 'Старый массив:<br>';
var_dump($array);
echo 'Новый массив:<br>';
var_dump($newArray);





























?>
