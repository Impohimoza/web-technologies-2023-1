<?php
include 'functions.php';

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check === false) {
    die("File is not an image.");
}

if (file_exists($target_file)) {
    die("Sorry, file already exists.");
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    die("Sorry, your file is too large.");
}

$allowed_types = array("jpg", "jpeg", "png", "gif");
if(!in_array($imageFileType, $allowed_types)) {
    die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $thumbnail_file = $target_dir . 'thumb_' . basename($_FILES["fileToUpload"]["name"]);
    create_thumbnail($target_file, $thumbnail_file);
    header("Location: index.php");
} else {
    die("Sorry, there was an error uploading your file.");
}
?>