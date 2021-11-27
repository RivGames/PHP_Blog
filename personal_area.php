<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\main_2.css">
    <title>Профиль</title>
</head>
<body>
    <h1 align="center">
    <?php
        /*
            Тут я реализовал профиль пользователя его можно еще расширить
            Но пока что так
            Проверяю авторизованный ли пользователь если нет то редирект на авторизацию
            Если он авторизован что вывожу дату когда он зарегистрировался
            Логин вывожу и потом еще можно изменить пароль или удалить аккаунт
            Всё это я реализовал здесь

        */
        session_start();
        $_SESSION['id'];
        $id = $_SESSION['id'];
        if(!empty($_SESSION['auth'])){
            include_once 'connect_to_bd.php';
            $query = "SELECT * FROM users WHERE id='$id'";
            $result = mysqli_query($link,$query);
            $data = mysqli_fetch_assoc($result);
            $date_register = $data['date'];
            $login_name = $data['login'];
            echo "<b>Вы вошли в ваш профиль!</b>";
            echo "<br>";
            echo "Дата регистрации: <b>$date_register</b>";
            echo "<br>";
            echo "Ваш Логин: <i>$login_name</i>";
        }
        else{

            $_SESSION['flash'] = "<b>Вы не вошли в аккаунт!</b>";
            $flash = $_SESSION['flash'];
            echo $flash;
            header("Location:auth.html");
        }

    ?>
    </h1>
    <form action="change_password.html" target="_blank" align="center">
        <button type="submit">Поменять пароль</button>
    </form>
    <form action="delete_account.html" target="_blank" align="center">
        <button type="submit">Удалить аккаунт</button>
    </form>
    <form action="index.php" target="" align="center">
            <button type="submit">Вернутся на главную</button>
    </form>
</body>
</html>