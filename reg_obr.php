<!Doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>MovieCamp</title>
	<link rel="stylesheet" type="text/css" href="register_style.css" >
	<link rel="shortcut icon" href="little_logo.png" type="image/x-icon">
	<script src="https://kit.fontawesome.com/e4d26e9cd6.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/font-awesome/4-4-0/font-awesome.min.css" />
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://bootstraptema.ru/plugins/2015/b-v3-3-6/bootstrap.min.js"></script>
<script src="https://bootstraptema.ru/_sf/3/394.js" type="text/javascript"></script>
  </head>
<?php 
header( 'Content-Type: text/html; charset=utf8');
require_once 'connection.php'; // подключаем скрипт

 
	if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirmation']) && isset($_POST['dateofb'])){
		
		$link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     mysqli_set_charset($link, "utf8");
		
	if($_POST['password'] != $_POST['password_confirmation']) {
            echo 'Пароли не совпадают';
	} else {
  $name= htmlspecialchars($_POST['name']);
  $surname = htmlspecialchars($_POST['surname']);
	$email=htmlspecialchars($_POST['email']);
 $password=htmlspecialchars($_POST['password']);
 $dateofb=htmlspecialchars($_POST['dateofb']);
 $sex = htmlspecialchars($_POST['sex']);
 $sql="INSERT INTO users
  (Name, Surname, Email,password, Date_of_birth,Sex)
	VALUES('$name','$surname', '$email', '$password', '$dateofb', '$sex')";
  $result=mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
 
	}
	}	
	?>