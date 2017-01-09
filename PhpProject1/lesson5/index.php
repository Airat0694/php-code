<?php

// echo 'Занятие 5. Примеры работы с файлами и изображениями.';
 

$file = fopen ("file.txt","r+");
$str = "------";
if ( !$file )
{
    echo("Ошибка открытия файла");
}
else
{
    fputs ( $file, $str);
}
fclose ($file);

readfile ("file.txt");


$file = fopen("file.txt","r");
if(!file)
{
    echo("Ошибка открытия файла");
}
else
{
    $buff = fread ($file,10);
    echo $buff;
}
//file_put_contents('file.txt', '123', FILE_APPEND);
//var_dump($string);
$config = parse_ini_file('config.ini');
var_dump($config);
