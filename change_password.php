<?php
include_once 'connect_to_bd.php';
session_start();
$_SESSION['id'];
/*
    Первым делом беру текущий пароль и айди пользователя
    Потом проверяю если что-то в инпутах если есть присваиваю значение переменным
    Если пароль старый совпадает с текущим паролем то..
    Делаю запрос к БД где меняю новый пароль с текущим
    Делаю пометку в $_SESSION['password']=$password;
    Все пароль изменён
*/
$password = $_SESSION['password'];
$id = $_SESSION['id'];
if(!empty($_POST['newpassword'] and !empty($_POST['oldpassword']))){
    $newpassword = $_POST['newpassword'];
    $oldpassword = $_POST['oldpassword'];
    if($oldpassword == $password){
        $query = "UPDATE users SET password='$newpassword' WHERE id='$id'";
        mysqli_query($link,$query);
        $password = $newpassword;
        $_SESSION['password'] = $password;
        echo "Пароль успешно изменен!";
    }else{
        echo "<b>Старый пароль не правильный!</b>";
    }
}else{
    echo 'Empty!';
}
?>