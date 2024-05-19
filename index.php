<?php
//Задание 1
$a = -5; 
$b = -3; 

if ($a >= 0 && $b >= 0) {
    echo $a - $b;
} elseif ($a < 0 && $b < 0) {
    echo $a * $b;
} else {
    echo $a + $b;
}

echo "<br>";
echo "<br>";

//Задание 2

$a = 3;

switch ($a) {
    case 0:
        echo "0 ";
    case 1:
        echo "1 ";
    case 2:
        echo "2 ";
    case 3:
        echo "3 ";
    case 4:
        echo "4 ";
    case 5:
        echo "5 ";
    case 6:
        echo "6 ";
    case 7:
        echo "7 ";
    case 8:
        echo "8 ";
    case 9:
        echo "9 ";
    case 10:
        echo "10 ";
    case 11:
        echo "11 ";
    case 12:
        echo "12 ";
    case 13:
        echo "13 ";
    case 14:
        echo "14 ";
    case 15:
        echo "15 ";
        break;
    default:
        echo "Некорректное значение<br>";
}

echo "<br>";
echo "<br>";

//Задание 3

function add($n, $m) {
    return $n + $m;
}

function subtract($n, $m) {
    return $n - $m;
}

function multiply($n, $m) {
    return $n * $m;
}

function divide($n, $m) {
    if ($m == 0) {
        return "Деление на ноль";
    } else {
        return $n / $m;
    }
}

$n = 10;
$m = 2;

echo "Операции для чисел $n и $m: " . "<br>";
echo "Сумма =  " . add($n, $m) . "<br>";
echo "Разность = " . subtract($n, $m) . "<br>";
echo "Произведение = " . multiply($n, $m) . "<br>";
echo "Деление = " . divide($n, $m) . "<br>";

echo "<br>";

//Задание 4

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case "add":
            return add($arg1, $arg2);
        case "subtract":
            return subtract($arg1, $arg2);
        case "multiply":
            return multiply($arg1, $arg2);
        case "divide":
            return divide($arg1, $arg2);
        default:
            return "Неизвестная операция";
    }
}

$n = 10;
$m = 2;

echo "Операции для чисел $n и $m: " . "<br>";
echo "Сумма = " . mathOperation($n, $m, 'add') . "<br>";
echo "Разность = " . mathOperation($n, $m, 'subtract') . "<br>";
echo "Произведение = " . mathOperation($n, $m, 'multiply') . "<br>";
echo "Деление = " . mathOperation($n, $m, 'divide') . "<br>";

echo "<br>";

//Задание 6
function power($val, $pow) {
    if ($pow == 0) {
        return 1;
    }

    if ($pow < 0) {
        return 1 / power($val, -$pow);
    }

    return $val * power($val, $pow - 1);
}

echo "2^3 = " . power(2, 3);
echo "<br>";  
echo "5^0 = " . power(5, 0);
echo "<br>";  
echo "2^-4 = " . power(2, -4); 

?>

