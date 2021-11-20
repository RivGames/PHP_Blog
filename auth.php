<?php
$host = "localhost";
$my_name = "root";
$my_password_db= "";
$my_name_of_db ='blog';

$link = mysqli_connect($host,$my_name,$my_password_db,$my_name_of_db);
session_start();
if (!empty($_POST['password']) and !empty($_POST['name'])) {
    $login = $_POST['name'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
    $query1 = "SELECT id FROM users WHERE login='$login'";
    $result1 = mysqli_query($link,$query1);
    $row = mysqli_fetch_row($result1);
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['password'] = $password;
    $_SESSION['login'] = $login;
    $id = $row[0];
    $_SESSION['id'] = $id; 
    if (!empty($user)) {
        header("Location: index.php");
        $_SESSION['id'] = $id; 
        $_SESSION['auth'] = true;

    } else {
        echo "<b>Вы ввели пароль или логин неправильно!</b>";
        // неверно ввел логин или пароль
    }
}
?>