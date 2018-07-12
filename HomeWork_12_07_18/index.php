<?php

//Task1
$products = [
    $goods1 = ['name' => 'Телевизор', 'price' => '400', 'quantity' => 1],
    $goods2 = ['name' => 'Телефон', 'price' => '300', 'quantity' => 3],
    $goods3 = ['name' => 'Кроссовки', 'price' => '150', 'quantity' => 2]
];

function getResults($array)
{
    $result = ['sum' => 0, 'quantity' => 0];
    foreach ($array as $key => $item) {
        $result['sum'] += $item['price'] * $item['quantity'];
        $result['quantity'] += $item['quantity'];
    }
    return $result;
}

foreach (getResults($products) as $key => $value) {
    echo '<pre>';
    echo "The total $key is $value<br>";
    echo '</pre>';
}


//Task2
function resolveEquation(int$a, int$b, int$c)
{
    $d = $b**2 - 4 * $a * $c;

    if ($d > 0) {
        $x1 = (-$b + sqrt($d)) / (2 * $a);
        $x2 = (-$b - sqrt($d)) / (2 * $a);
        return $result = [$x1, $x2];
    } elseif ($d == 0) {
        $x = -$b/(2 * $a);
        return $result = $x;
    } else {
        return $result = false;
    }
}

echo '<pre>';
var_dump(resolveEquation(10, 21, -10));
echo '</pre>';


//Task3
function deleteNegatives($array)
{
    foreach ($array as $key => $value) {
        if ($array[$key] < 0) {
            unset($array[$key]);
        }
    }
    return $array;
}

$digits = [2, -10, -2, 4, 5, 1, 6, 200, 1.6, 95];

echo '<pre>';
var_dump(deleteNegatives($digits));
echo '</pre>';


//Task4
function deleteNegativesLink(&$array)
{
    foreach ($array as $key => $value) {
        if ($array[$key] < 0) {
            unset($array[$key]);
        }
    }
    return $array;
}



echo '<pre>';
echo 'Initial array<br>';
var_dump($digits);
echo '<hr>';
echo '</pre>';

echo '<pre>';
echo 'Deleting negative numbers<br>';
var_dump(deleteNegativesLink($digits));
echo '<hr>';
echo '</pre>';

echo '<pre>';
echo 'Edited Array<br>';
var_dump($digits);
echo '<hr>';
echo '</pre>';






















