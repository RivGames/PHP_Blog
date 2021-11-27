<?php
//Написал подключение к БД и вынес в отдельный файл 
//чтобы не дублировать каждый раз один и тот же код во многих файлах
$host = "localhost";
$my_name = "root";
$my_password_db= "";
$my_name_of_db ='blog';

$link = mysqli_connect($host,$my_name,$my_password_db,$my_name_of_db);

?>