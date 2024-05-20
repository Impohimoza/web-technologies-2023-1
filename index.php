<?php
echo 'Задание 1 <br>';
function printNumbers()
{
    $number = 0;
    do {
        if ($number == 0) {
            echo "$number - это ноль.<br>";
        } elseif ($number % 2 == 0) {
            echo "$number - чётное число.<br>";
        } else {
            echo "$number - нечётное число.<br>";
        }
        $number++;
    } while ($number <= 10);  
}

echo printNumbers();
echo "<br>";

echo 'Задание 2 <br>';
$regions = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань', 'Касимов', 'Скопин']
];

foreach ($regions as $region => $cities) {
    echo "$region:<br>";
    echo implode(', ', $cities) . '.<br>';
}

echo "<br>";


echo 'Задание 3 <br>';
function transliterate($text) {
    $letters = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 
        'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
    ];

    return str_replace(array_keys($letters), array_values($letters), mb_strtolower($text));
}

echo transliterate('Привет, мир!');

echo "<br>";
echo "<br>";

echo 'Задание 4 <br>';

$menu = [
    'Главная' => [],
    'О компании' => [
        'История' => [],
        'Команда' => [],
        'Партнеры' => []
    ],
    'Продукты' => [
        'Новые продукты' => [],
        'Акции' => [],
        'Каталог' => []
    ],
    'Контакты' => []
];

function printMenu($menuItems, $isSubmenu = false) {
    $class = $isSubmenu ? ' class="submenu"' : ' class="main-menu"';
    echo "<ul$class>";

    foreach ($menuItems as $key => $subItems) {
        echo "<li>";
        echo $key;
        if (!empty($subItems)) {
            printMenu($subItems, true);
        }
        echo "</li>";
    }

    echo "</ul>";
}

printMenu($menu);

echo "<br>";

echo 'Задание 6 <br>';

foreach ($regions as $region => $cities) {
    $filteredCities =array_filter($cities, function ($city) {
        return mb_substr($city, 0, 1) === 'К';
    });

    if (!empty($filteredCities)) {
        echo "$region:<br>";
        echo implode(', ', $filteredCities) . '.<br>';
 }
}
?>