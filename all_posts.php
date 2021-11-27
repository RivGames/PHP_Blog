<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<body align="center">
    <?php
        include_once 'posts.php';
        include_once 'connect_to_bd.php';
        //подключаю все нужный файлы
        $query = "SELECT content FROM articles";
        $result = mysqli_query($link,$query);
        $content = mysqli_fetch_all($result);
        //вывожу контент по ключу-значению
        foreach ($content as $key => $value) {
            echo "<br />";
            echo  '<i>' . ($value[0]) . '</i>';
        }   

    ?>
    <form name="comment" action="comment.php" method="post">
        <p>
            <label>Имя:</label>
            <input type="text" name="name" />
        </p>
        <p>
            <label>Комментарий:</label>
            <br />
            <textarea name="text_comment" cols="30" rows="20"></textarea>
        </p>
        <p>
            <input type="hidden" name="page_id" value="150" />
            <input type="submit" value="Отправить" />
        </p>
</form>
<?php
include_once 'comment.php';
foreach ($comments as $key => $value) {
    echo "<br />";
    echo "$value[0]";
}
?>
</body>
</html>