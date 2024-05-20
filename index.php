<?php
include 'functions.php';
log_request();

$images = glob('images/thumb_*.{jpg,jpeg,png,gif}', GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Галерея</title>
    <style>
        .thumbnail {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1>Галерея</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Выберите изображение для загрузки:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Загрузить" name="submit">
    </form>
    <div class="gallery">
        <?php foreach ($images as $image): ?>
			<?php $bigImage = str_replace('thumb_', '', $image); ?>
            <a href="<?php echo $bigImage; ?>" target="_blank">
                <img src="<?php echo $image; ?>" class="thumbnail">
            </a>
        <?php endforeach; ?>
    </div>
</body>
</html>