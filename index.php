<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="menu">
        <?php 
        include("functions.php");
        echo generateMenu(); 
        ?>

    </div>
    <script src="script.js"></script>
</body>
</html>