<?php
include_once 'connect_to_bd.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\main_2.css">
    <title>Авторизация</title>
</head>
<body align="center">
    <?php
        session_start();
        if (!empty($_POST['password']) and !empty($_POST['name'])) {
            /*
                Сначала проверяю ввёл ли пользователь данные в инпуты
                Далее делаю присвоение переменным значения з инпутов
                Из БД беру все данные и присваиваю переменным
                Делаю проверку правильные ли введеные данные и совпадают они с теми что в бд
                Потом проверяю пользователь забанен или не забанен
                Если всё ок тогда авторизую пользователя и
                $_SESSION['id'] = $id;
                $_SESSION['auth'] = true;
            */
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
            $query_banned = "SELECT `banned` FROM `users` WHERE id='$id'";
            $result_banned = mysqli_query($link,$query_banned);
            $banned = mysqli_fetch_array($result_banned);
            if(!empty($user)){
                if($banned[0]==0){
                    header("Location: index.php");
                    $_SESSION['id'] = $id; 
                    $_SESSION['auth'] = true;
                }else{
                    echo "Вы забанены";
                }
            }else{
                echo "Вы ввели неверный пароль!";
            }
        }
    ?>
</body>
</html>