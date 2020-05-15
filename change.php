<!DOCTYPE html>
<html>
<head>
 <title>Сеть магазинов ЕВРООПТ</title>
 <link rel="shortcut icon" href="l.jpg" type="jpg">
</head>
<body>
<?php
header( 'Content-Type: text/html; charset=utf8');
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['id']) && isset($_POST['новая'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     mysqli_set_charset($link, "utf8");
    // экранирования символов для mysql
    $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
    $новая = htmlentities(mysqli_real_escape_string($link, $_POST['новая']));
	
    // создание строки запроса
    $query ="UPDATE goods_s SET Цена = '$новая' WHERE id = '$id'";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:blue;'>Цена изменена</span>";
    }
    // закрываем подключение
    mysqli_close($link);
}
?>

<h2><p align = 'center'>Изменить цену товара</h2></p>
<form action = "change.php" method="POST">
<p>Введите id товара:<br> 
<input type="integer" name="id" /></p>
<p>Введите новую цену: <br> 
<input type="integer" name="новая" /></p>
<input type="submit" value="Изменить">
</form>
<p align = 'center'><a href = 'first_page.html'style = 'text-decoration: none; color:black; font-size:15px'> На главную</a>
<p align = 'center'><a href = 'show_goods_s.php'style = 'text-decoration: none; color:black; font-size:15px'> Назад</a> 
</body
</html>