<!Doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>MovieCamp</title>
	<link rel="stylesheet" type="text/css" href="filmscoll_style.css" >
	<link rel="shortcut icon" href="little_logo.png" type="image/x-icon">
	<script src="https://kit.fontawesome.com/e4d26e9cd6.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/font-awesome/4-4-0/font-awesome.min.css" />
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://bootstraptema.ru/plugins/2015/b-v3-3-6/bootstrap.min.js"></script>
<script src="https://bootstraptema.ru/_sf/3/394.js" type="text/javascript"></script>
<script src = "modal.js" type="text/javascript"></script>
  </head>
  <header>
  <div class="topnav">
  <logot><a  href="kabinet.html"><img src = "little_logo.png" alt = "На главную" width = "75" height = "60"/></a></logot>
  <a  href="messages.html">Мои сообщения</a>
  <a class="active" href="collections.php">Мои коллекции</a>
<search><a href = "mainpage.php">Выход </a></search>
   <logotwo> <a><img src = "user.png" alt = "Пользователь" width = "35" height = "35"/></a></logotwo>
   <search> <a href = "find.html"> Поиск </a> </search>
   <life> <a> Life is better with a good movie </a> </life>
   </header>
   <?php
   session_start(); //otkrili sessiju
    header( 'Content-Type: text/html; charset=utf8');
require_once 'connection.php'; // подключаем скрипт

 $uid =  $_SESSION['us_id'];

$collid = $_GET['collid'];

   
   $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     mysqli_set_charset($link, "utf8");
	 
	 $query = 'SELECT content_ed.Name, content_ed.Poster from content_ed JOIN films_in_coll ON content_ed.id = films_in_coll.cont_ed WHERE films_in_coll.coll_id = "'.$collid.'" AND films_in_coll.us_id = "'.$uid.'"';
	 $res=mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	 $j = 0;
	 do {
		 ++$j;
	 $films = mysqli_fetch_row($res); //преобразуем ответ из БД в нормальный массив PHP
	 $arr[$j] = $films['1']; 
	 $idarr[$j] = $films['0'];
	 
	 } while ($arr[$j] != null);
	
   ?>
   
   <body>
   
   <a class="arrow-3" href="collections.php">
   <div class = "arrow3-top">
    <svg class="arrow-3-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
        <g fill="none" stroke="#337AB7" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
            <circle class="arrow-3-iconcircle" cx="16" cy="16" r="15.12"></circle>
            <path class="arrow-3-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
        </g>
    </svg>
	</div>
	Назад
</a>
   
   <?php
   
   if(empty($arr['1']))
   {
	   echo'<div class="pusto"> В этой коллекции пока нет фильмов</div>';
   }
else{
echo'<div class = "midnav">';
for ($i = 1; $i < $j; ++$i){
	if ($arr[$i] != null){
		
		echo'<a href = "films_in coll.php"><img src="'.$arr[$i].'" title= "'.$idarr[$i].'" /></a>';
	}
}
echo'</div>';
}
?>

   </body>
    <div class = "footer">
<div class= "fot"><center><p><h4> Мы в социальных сетях:</h4> </p></center></div>
<div class="social github">
    <a href="#" target="_blank"><i class="fa fa-github fa-2x"></i></a>
</div>
<div class="social instagram">
    <a href="#" target="_blank"><i class="fa fa-instagram fa-2x"></i></a> </div>
<div class="social vk">
    <a href="#" target="_blank"><i class="fa fa-vk fa-2x"></i></a>    
</div>
<div class="social telegram">
    <a href="#" target="_blank"><i class="fa fa-paper-plane fa-2x"></i></a>
</div> 
<div class="social whatsapp">
    <a href="#" target="_blank"><i class="fa fa-whatsapp fa-2x"></i></a>
</div>
</div>