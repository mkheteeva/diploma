<?php
 session_start(); //otkrili sessiju
    header( 'Content-Type: text/html; charset=utf8');
require_once 'connection.php'; // подключаем скрипт

   $uid =  $_SESSION['us_id'];
   $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     mysqli_set_charset($link, "utf8");
	 if ( !empty($_POST['collname']) ) {
	
	$link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     mysqli_set_charset($link, "utf8");
	
	$name= htmlspecialchars($_POST['collname']);
	$query = "INSERT INTO collections(Name, user_id) VALUES ('$name','$uid')";
	$result=mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
} 
			$URL="collections.php";
			header ("Location: $URL");
?>