<?php
// показать фото с полным путем из БД

include 'sqlconnect.php';

$tpl=file_get_contents('showidpic.tpl');
$id=$_GET['id'];
$db=$_GET['db'];