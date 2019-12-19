<?php include 'sqlconnect.php';

$sql="SELECT * FROM $sqltable ORDER BY opened DESC";

$sqlnewseen="UPDATE $sqltable SET seen=seen+1 WHERE id=";
$result=mysqli_query($connection,$sql);

if(mysqli_num_rows($result)>0){
    while ($row=mysqli_fetch_assoc($result)){
        $sqlres=mysqli_query($connection,$sqlnewseen.$row["id_pictures"]);
        $thumb=$row["path"].'image_small\\'.$row["filename"];
        $fullimage=$row["path"].'images\\'.$row["filename"];
        $seen=$row["seen"];
        $opened=$row["opened"];

        echo '<div class="gallery-item">'
        echo'    <a class="gallery-picture" rel="gallery" href="image.php?photo='.row["id"].'&db='.sqltable.'target="_blank"><img width="271" height="376" src='<?=$dir_with_small_pictures."/".$files_small_pictures[$i]?>'></a>'
            <span class="gallery-text">Имя файла:<span class="game-version"><?=$files_big_pictures[$i]?></span></span>

        </div>
    }
}
