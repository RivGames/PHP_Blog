<?php
include_once 'connect_to_bd.php';
session_start();//начинаю сессию
if(!empty($_POST['name']) and !empty($_POST['password'] and !empty($_POST['password1']))){
    if($_POST['password'] == $_POST['password1']){//проверяю первый пароль со вторым
        //раздаю з инпутов переменым значения
        $login = $_POST['name'];
        $password = $_POST['password'];
        $date = date("Y-m-d");//сдлелал еще и дату когда пользователь зарегистрировался
        $query = "INSERT INTO users SET login='$login', password='$password',date='$date',status_id=0,banned=0";
        //добавляю всё в б БД
        mysqli_query($link,$query);

        //в сессию auth ставлю значение true
        $_SESSION['auth'] = true;
        //делаю редирект на основную страницу
        header("Location: index.php");
        //беру айди пользователя чтобы бы был в суперглобальном массиве $_SESSION
        $id = mysqli_insert_id($link);
        $_SESSION['id'] = $id;
    }else{
        echo "Пароли не совпадают!";
    }
}   
?>