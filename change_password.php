<?php
$host = "localhost";
$my_name = "root";
$my_password_db= "";
$my_name_of_db ='blog';

$link = mysqli_connect($host,$my_name,$my_password_db,$my_name_of_db);
session_start();
$_SESSION['id'];
$password = $_SESSION['password'];
$id = $_SESSION['id'];
if(!empty($_POST['newpassword'] and !empty($_POST['oldpassword']))){
    $newpassword = $_POST['newpassword'];
    $oldpassword = $_POST['oldpassword'];
    // echo "$password";//123
    // echo "$newpassword";//12
    // echo "$oldpassword";//123
    if($oldpassword == $password){
        $query = "UPDATE users SET password='$newpassword' WHERE id='$id'";
        mysqli_query($link,$query);
        $password = $newpassword;
        $_SESSION['password'] = $password;
        echo "Пароль успешно изменен!";
    }else{
        echo "<b>Старый пароль не правильный!</b>";
    }
    // $old_password = mysqli_fetch_assoc($result);
    // var_dump($old_password);
}else{
    echo 'Empty!';
}
?>