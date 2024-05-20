<?php
function create_thumbnail($src, $dest, $desired_width = 150) {
    $source_image = imagecreatefromstring(file_get_contents($src));
    $width = imagesx($source_image);
    $height = imagesy($source_image);

    $desired_height = floor($height * ($desired_width / $width));
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

    imagejpeg($virtual_image, $dest);
}


function log_request() {
    $log_file = 'log.txt';
    $max_entries = 10;

    $log_entries = file_exists($log_file) ? file($log_file) : array();

    $log_entries[] = date('Y-m-d H:i:s') . " - " . $_SERVER['REQUEST_URI'] . "\n";

    if (count($log_entries) > $max_entries) {
        $log_number = 1;
        while (file_exists("log{$log_number}.txt")) {
            $log_number++;
        }
        rename($log_file, "log{$log_number}.txt");
        $log_entries = [];
    }

    file_put_contents($log_file, $log_entries);
}