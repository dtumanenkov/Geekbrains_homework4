<?php include 'sqlconnect.php';

$sql="SELECT * FROM $sqltable ORDER BY opened DESC";

$sqlnewseen="UPDATE $sqltable SET seen=seen+1 WHERE id=";
$result=mysqli_query($connection,$sql);

if(mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $sqlres = mysqli_query($connection, $sqlnewseen . $row["id_pictures"]);
        $thumb = $row["path"] . '\\' . $row["filename"];
        $fullimage = $row["path"] . 'images\\' . $row["filename"];
        $seen = $row["seen"];
        $opened = $row["opened"];

        echo '<div class="gallery-item">';
        echo '<a class="gallery-picture" rel="gallery" target="_blank" href="image.php?photo='.$row["id_pictures"].'&db='.$sqltable.'"><img width="271" height="376" src="'.$thumb.'" alt="pic"></a>';
        echo '<span class="gallery-text">Имя файла:<span class="game-version">' . $row["filename"] . '</span></span>';
        echo '<span class="gallery-text">Количество просмотров:<span class="game-version">' . $seen . '</span></span>';
        echo '<span class="gallery-text">Открыто раз:<span class="game-version">' . $opened . '</span></span>';
        echo '</div>';
        }
    }
    else{
       echo "Изображений в БД нет";
    }

