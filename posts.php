<?php
/*
    Тут кстати тоже есть были некоторые трудности
    я не понял как под отдельный пост делаю генирацию отдельной страницы
    Поэтому подумал пусть все посты будут на одной странице да это неочень
    Но я считаю бывают всякие пользователи и нужно проверять что они пишут а потом
    уже в ручную создавать файл с этим постом так что думаю не сильно это плохо
    
*/
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\main_2.css">
    <title>Posts</title>
</head>
<body align="center">
    <h1>Посты:</h1>
    <?php
        include_once 'connect_to_bd.php';
        $query = "SELECT title FROM articles";
        $result = mysqli_query($link,$query);
        $title = mysqli_fetch_all($result); 
        foreach ($title as $key => $value) {
            echo "<br />";
            // echo  '<i>' . ($value[0]) . '</i>';
            echo "<a href='all_posts.php'>$value[0]</a>";
        }   
    ?>
</body>
</html>