<?php
include_once 'gallery.php';

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Homework4</title>
</head>

<body>
    <a href="index.php" Вернуться на главную!></a>
    <div>
        <img src="<?=$dir_with_big_pictures."/".$_GET['photo'] ?> ">
    </div>
</body>
</html>