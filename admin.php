
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\main_2.css">
    <title>Админка</title>
</head>
<body align="center">
    <?php
    session_start();
    include_once 'connect_to_bd.php';
    $_SESSION['id'];
    $id = $_SESSION['id'];
    $query = "SELECT status_id FROM users WHERE id='$id'";
    //Отправляю запрос к базе чтобы получить статус пользователя
    //Записую все это в переменную
    $result = mysqli_query($link,$query);
    $status_id = mysqli_fetch_row($result);
    
    if(!empty($_SESSION['auth'])){
        //если админ зашел в аккаунт то...
        if($status_id[0] == 1){
            //проверяем админ пользователь или нет
            //1-админ 0-пользователь
            echo "Вы можете забанить аккаунт на сайте";
        }else{
            //редирект в личный кабинет 
            header("Location:personal_area.php");
        }
    }else{
        //редирект чтобы пользователь смог авторизоватся
        header("Location:auth.html");
    }
    ?>
    <form action="ban_user.php" method="POST">
        <input name='ban_id' type="number">Укажите id пользователя!</button>
        <input type="submit">Забанить</button>
    </form>
    <form action="index.php" target="" align="center">
        <button type="submit">Вернутся на главную</button>
    </form>
</body>
</html>