<?php
/*
    Тут делаю следующее
    Делаю присвоение переменным значения из супер-глобально массива POST
    Далее "Обрабатываю" эти переменные чтобы хакер не вставил например вредосный код на JS
    Подключаю БД
    Потом делаю запрос к БД где устанавливаю полям из БД значения полученные из переменных
    Потом делаю выбор коментариев из базы данных
    Возвращаю пользователя обратно
    Что-то у меня они так и неполучились коментарии.Но в будущем сделаю их хорошо
*/
$name = $_POST['name'];
$page_id = $_POST['page_id'];
$text_comment = $_POST['text_comment'];
$name = htmlspecialchars($name);
$text_comment = htmlspecialchars($text_comment);
include_once 'connect_to_bd.php';
$query0 = "INSERT INTO comments SET name='$name',page_id='$page_id',text_comment='$text_comment'";
mysqli_query($link,$query0);
$query = "SELECT * FROM comments WHERE page_id='$page_id'";
$result = mysqli_query($link,$query);
$comments = mysqli_fetch_all($result);
header("Location: ".$_SERVER["HTTP_REFERER"]);
?>