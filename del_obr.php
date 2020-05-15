<?php
 session_start(); //otkrili sessiju
    header( 'Content-Type: text/html; charset=utf8');
require_once 'connection.php'; 

   $uid =  $_SESSION['us_id'];
   $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка" . mysqli_error($link)); 
     mysqli_set_charset($link, "utf8");
	 if ( !empty($_POST['collections']) ) {
	
	$collections= $_POST['collections'];
	$c = count($collections);
	for ( $i = 0; $i <$c; ++$i){
		$query = 'DELETE FROM collections WHERE Name = "'.$collections[$i].'" AND user_id = "'.$uid.'"';
		$result=mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
	}
	$URL="collections.php";
	header ("Location: $URL");
	$_SESSION['delmess'] = 'Коллекции удалены';
}
else {
	$URL="delete_coll.php";
	header ("Location: $URL");
	$_SESSION['delmess2'] = 'Вы не выбрали коллекцию';
} 
			
?>