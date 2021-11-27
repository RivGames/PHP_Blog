<?php
/*
    Делаю удаление аккаунта 
    Беру пароль из массива глобального
    Проверяю не пусто ли в суперглобальном массиве
    Если не пусто и пароль тот что ввели сходится с тем что в БД
    Удаляю аккаунт и всё что с ним связано и сразу же делаю пометку
    В $_SESSION['auth'] = null;
*/
include_once 'connect_to_bd.php';
session_start();
$_SESSION['id'];
$password = $_POST['password'];
$id = $_SESSION['id'];
if(!empty($_POST['password'])){
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($link,$query);
    $user = mysqli_fetch_assoc($result);
    echo $user['password'];
    if($password == $user['password']){
        $query1 = "DELETE FROM users WHERE id='$id'";
        mysqli_query($link,$query1);
        $_SESSION['auth'] = null;
        header("Location: index.php");

    }else{
        echo "<b>Пароль не верный!</b>";
    }
}else{
    //Пусто
    echo 'Empty!';
}
?>