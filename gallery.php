<?php
$dir_with_small_pictures="image_small";
$dir_with_big_pictures="images";

$files_small_pictures=array_slice(scandir($dir_with_small_pictures),2); //  отсекаем .  и ..
$files_big_pictures=array_slice(scandir($dir_with_big_pictures),2);

function translit_of_russian_word_with_no_spaces($string) { //Транслитерация русских строк
    $array_of_letter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'c',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'Y',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        ' '=>'_',
    );
    return str_replace(' ','_',strtr(mb_strtolower(trim($string)), $array_of_letter));
}

function changeImage($h,$w,$src,$newSrc,$type){
    $newimg=imagecreatetruecolor($h,$w);
    switch ($type){
        case 'jpeg':
            $img=imagecreatefromjpeg($src);
            imagecopyresampled($newimg,$img,0,0,0,0,$h,$w,imagesx($img),imagey($img));
            imagejpeg($newimg,$newsrc);
            break;
        case 'png':
            $img=imagecreatefrompng($src);
            imagecopyresampled($newimg,$img,0,0,0,0,$h,$w,imagesx($img),imagey($img));
            imagepng($newimg,$newsrc);
            break;
        case 'gif':
            $img=imagecreatefromgif($src);
            imagecopyresampled($newimg,$img,0,0,0,0,$h,$w,imagesx($img),imagey($img));
            imagegif($newimg,$newsrc);
            break;
    }
}

if (isset($_POST['send'])){
    if($_FILES['userfile']['error']){
        $message='Ошибка при загрузке!';}
    elseif($_FILES['userfile']['size']>1000000){
        $message='Файл слишком большой';
    }
    elseif(
        $_FILES['userfile']['type']=='image/jpeg'||
        $_FILES['userfile']['type']=='image/png'||
        $_FILES['userfile']['type']=='image/gif'
    ){
        if (copy($_FILES['userfile']['tmp_name'], PHOTO.translit_of_russian_word_with_no_spaces($_FILES['userfile']['name']))){
            $path=PHOTO_SMALL.translit_of_russian_word_with_no_spaces($_FILES['userfile']['name']);
            $type=explode('/',$_FILES['userfile']['type'])[1];
            changeImage(150,150,$_FILES['userfile']['tmp_name'],$path,$type);
        }
        else{$message='Ошибка загрузки!';}
    }
    else{
        $message='Неправильный тип файла!';
    }

    }
//$images=array_slice(scandir(PHOTO_SMALL),2);
?>
