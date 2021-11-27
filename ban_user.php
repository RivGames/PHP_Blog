<?php
$_POST['ban_id'];
$id = $_POST['ban_id'];
include_once 'connect_to_bd.php';
$query = "UPDATE users SET banned=1 WHERE id='$id'";
//ну тут просто запрос делаю к БД чтобы забанить пользователя и тем самым в БД 
//в поле banned записываю 1 
mysqli_query($link,$query);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\main_1.css">
    <link rel="stylesheet" href="css\main_2.css">
    <title>Удалено</title>
</head>
<body align="center">
    <h1>Пользователь удален!</h1>
    <form action="index.php" target="" align="center">
            <button type="submit">Вернутся на главную</button>
    </form>
</body>
</html>