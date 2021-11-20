<?php
/*
    Начинаю сессию
    В сессию auth кидаю null
    В сессию id кидаю тоже null
    Все пользователь вышел со свого аккаунта
    Делаю редирект на основную страницу
*/
session_start();
$_SESSION['auth'] = null;
$_SESSION['id'] = null;
header("Location: index.php");
?>