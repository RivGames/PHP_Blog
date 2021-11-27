<!DOCTYPE html>

<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width', user-scalable=no, initial-scale=1.0>
<link rel="stylesheet" href="css\main_2.css">
<title>Создать статью</title>
</head>
<body>
    <?php
        session_start();
        if(!empty($_SESSION['auth'])){ 
        }else{
            header("Location:auth.html");
        }
    ?>
    <?php
        /*
        
            Так ну тут тоже всё просто
            Проверяю не пусто ли в инпутах полученных из суперглобального массива
            Присваиваю переменным значения из суперглобального массива
            Беру текущую дату и вношу в БД
            Потом записываю какой пользователь создал этот пост чтобы он мог
            В дальнейшем редактировать этот пост или удалить я придумал как то так
            Чтобы можно было различать кто создал этот пост
            Далее все кидаю в БД и все

        */
        include_once 'connect_to_bd.php';
        
        if(!empty($_POST['title']) and !empty($_POST['content'])){
            $title = $_POST['title'];
            $date = date("Y-m-d");
            $content = $_POST['content'];
            $id_user = $_SESSION['id'];
            echo "$id_user";
            $query = "INSERT INTO articles SET title='$title', date='$date', content='$content',id_user='$id_user'";
            mysqli_query($link,$query);
            header("Location: index.php");
        }
    ?>
    <center>
        <form action="" method="POST">
            <fieldset>
                 <legend align="right">Статья</legend>
                <table>
                    <tr>
                        <td><label for="name">Название статьи:</label></td>
                        <td><input type="text" name="title" placeholder="Название"></td>
                    </tr>
                    <tr>
                        <td><label for="name"></label>Текст</td>
                        <td><textarea name="content" rows="20" cols="30"></textarea></td>
                    </tr>
                </table>
                <button type="submit" >Создать!</button>
            </fieldset>
        </form>
        <form action="index.php" target="" align="center">
            <button type="submit">Вернутся на главную</button>
        </form>
        <form action="posts.php" target="" align="center">
            <button type="submit">Посты</button>
        </form>
    </center>
    <footer>
        <p>Мой блог</p><br>&copy 2021
        <p>All rights reserved created by Ihor Rud</p>
    </footer>
</body>
</html>