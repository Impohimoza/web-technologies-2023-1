<?php
$pageTitle = "Моя главная страница";
$headerTitle = "Добро пожаловать на мой сайт!";
$currentYear = date("Y");

function getCurrentTime() {
    $hours = date("H");
    $minutes = date("i");

    if ($hours == 1 || $hours == 21) {
        $hoursText = $hours . " час";
    } elseif (($hours >= 2 && $hours <= 4) || ($hours >= 22 && $hours <= 24)) {
        $hoursText = $hours . " часа";
    } else {
        $hoursText = $hours . " часов";
    }


    if ($minutes == 1 || $minutes == 21 || $minutes == 31 || $minutes == 41 || $minutes == 51) {
        $minutesText = $minutes . " минута";
    } elseif (($minutes >= 2 && $minutes <= 4) || ($minutes >= 22 && $minutes <= 24) || ($minutes >= 32 && $minutes <= 34) || ($minutes >= 42 && $minutes <= 44) || ($minutes >= 52 и $minutes <= 54)) {
        $minutesText = $minutes . " минуты";
    } else {
        $minutesText = $minutes . " минут";
    }

    return $hoursText . " " . $minutesText;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
</head>
<body>
    <h1><?php echo $headerTitle; ?></h1>
    <p>Текущий год: <?php echo $currentYear; ?></p>
    <p>Текущее время: <?php echo getCurrentTime(); ?></p>
</body>
</html>
