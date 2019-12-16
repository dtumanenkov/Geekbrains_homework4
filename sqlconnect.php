<?php
// подключение к БД

$sqlserver="localhost";
$sqluser="root";
$sqlpass="";
$sqlbase="lesson6";

$connection=mysqli_connect($sqlserver,$sqluser,$sqlpass,$sqlbase);

if(!$connection){
    echo"Код ошибки:".mysqli_connect_errno();
    echo"<br>";
    echo"Текст ошибки".mysqli_connect_error();
    exit();
}
