<?php
$dir_with_small_pictures="image_small";
$dir_with_big_pictures="images";

$files_small_pictures=array_slice(scandir($dir_with_small_pictures),2); //  отсекаем .  и ..
$files_big_pictures=array_slice(scandir($dir_with_big_pictures),2);
?>