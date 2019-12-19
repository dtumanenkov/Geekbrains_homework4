<!--Работа с БД  -->



<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Homework4</title>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600|Roboto+Condensed:300,400,700&display=swap&subset=cyrillic" rel="stylesheet">

</head>

<!-- Раздел Галерея-->

<body>
    <div class="container">
        <h1>Работа с базой данных</h1>
        <div class="gallery">
            <!-- Стандартный блок картинки-->
            <?php
            $sqltable="pictures";
            include 'showimage.php';
            ?>
         </div>





    </div>
    <div class="add_foto">
        <form action="" method="post" enctype="multipart/form-data">
        <span>Добавить фото:</span>
            <input type="file" name="userfile">
            <button type="submit" name="send">Загрузить</button><br>
            <span><?=$message?> </span>
        </form>
    </div>
</body>

</html>

?