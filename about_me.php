<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about me</title>
</head>
<body>
    <?php
    session_start();
    if(!empty($_SESSION['auth'])){
        //Если человек зашел в аккаунт выводим сообщение
        echo "<b>I am Ihor Rud</b>";
    }else{
        //В противном случае отправляем на авторизацию
        $_SESSION['flash'] = "<b>Вы не вошли в аккаунт!</b>";
        $flash = $_SESSION['flash'];
        echo $flash;
        header("Location:auth.html");
    }
    ?>
    <form action="index.php" target="" align="center">
        <button type="submit">Вернутся на главную</button>
    </form>
</body>
<footer>
    <b>My age is 16 years old</b>
    <b>I learn PHP about 3 months.Before I had study C# and a tiny bit of Python!</b>
</footer>
</html>
