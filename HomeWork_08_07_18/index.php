<?php

//Task1

/*Philipp Vlasov
11/07/2018 */

echo 'Hi, this is my first homework';

//Task2

$chanelName;
$productionAddress;
$carColor;
$waterTemperature;
$phoneModel;

//Task3
$first = 3;
$second = 5;
$third = 8;

echo '<pre>';
echo $first, ', ', $second, ', ', $third, '<br>';
echo 'Sum = ',  $sum = $first + $second + $third, '<br>';
echo 'Result = ',  $result = 2 + 6 + 2/5 - 1, '<br>';
echo '</pre>';

//Task4

$a = 1;
$b = 2;

echo '<pre>';
echo 'a = ', $a, '<br>';
echo 'b = ', $b, '<br>';
echo '</pre>';

$c = $a;
//$d = &$b; interferes with Task11

echo '<pre>';
echo 'c = ', $c, '<br>';
//echo 'd = ', $d, '<br>'; interferes with Task11
echo '</pre>';

$a = 3;
$b = 4;

echo '<pre>';
echo 'a = ', $a, '<br>';
echo 'b = ', $b, '<br>';
echo 'c = ', $c, '<br>';
echo 'd = ', $d, '<br>';
echo '</pre>';

//Task5

const AA = 41;
const BB = 33;

//BB = 55;

echo '<pre>';
echo 'Sum AA + BB = ', AA + BB, '<br>';
echo '</pre>';

//Task6

$a = 152;
$b = '152';
$c = 'London';
$d = array(152);
$e = 15.2;
$f = false;
$g = true;

$data = array($a, $b, $c, $d, $e, $f, $g);

foreach ($data as $val) {
    echo gettype($val), '<br>';
}

//Task7

$a = 10;
$b = 5;

echo '<pre>';
echo "Результат: $b из {$a}ти студентов посетили лекцию.", '<br>';
echo 'Результат: ' . $b . ' из ' . $a . 'ти студентов посетили лекцию.', '<br>';
echo '</pre>';

//Task8

$a = 'Доброе утро';
$b = 'дамы';
$b = 'дамы';
$c = 'и господа';

echo '<pre>';
echo $a, '<br>';
echo $b, '<br>';
echo $c, '<br>';
echo $a . ', ' . $b . ' ' . $c, '<br>';
echo '</pre>';

//Task9

$array1 = range(1, 5);
$array2 = range(1, 10, 2);

$array1['element'] = 'newValue';

unset($array2[0]);

echo '<pre>';
echo $array1[2], '<br>';
echo $array2[2], '<br>';

var_dump($array1);
var_dump($array2);

echo 'First array length is ' . count($array1) . '<br>';
echo 'Second array length is ' . count($array2) . '<br>';
echo '</pre>';

//Task 10

const MIN = 10, MAX = 50;
$x = 10;
if ($x > MIN && $x < 50) {
    echo '+';
} elseif ($x == MIN || $x == MAX) {
    echo '+-';
} else {
    echo '-';
}

//Task11

$a = 10;
$b = 21;
$c = -10;

$d = $b**2 - 4 * $a * $c;

if ($d > 0) {
    $x1 = (-$b + sqrt($d)) / (2 * $a);
    $x2 = (-$b - sqrt($d)) / (2 * $a);
    $result = "Answer is $x1 and $x2";
} elseif ($d == 0) {
    $x = -$b/(2 * $a);
    $result = "Answer is $x";
} else {
    $result = 'No answer';
}
echo '<pre>';
echo $result;
echo '</pre>';



















