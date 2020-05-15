<!Doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>MovieCamp</title>
	<link rel="stylesheet" type="text/css" href="coll_style.css" >
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
  <a  href="mess.php">Мои сообщения</a>
  <a class="active" href="collections.php">Мои коллекции</a>
<search><a href = "mainpage.php">Выход </a></search>
   <logotwo> <a><img src = "user.png" alt = "Пользователь" width = "35" height = "35"/></a></logotwo>
   <search> <a href = "find.html"> Поиск </a> </search>
   <life> <a> Life is better with a good movie </a> </life>
   </header>
   <body>
   <?php
   session_start(); //otkrili sessiju
    header( 'Content-Type: text/html; charset=utf8');
require_once 'connection.php'; // подключаем скрипт

   $uid =  $_SESSION['us_id'];
	$link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     mysqli_set_charset($link, "utf8");
	 
	 $qq = 'SELECT id,Name FROM collections WHERE user_id = "'.$uid.'"';
	 $res=mysqli_query($link, $qq) or die("Ошибка " . mysqli_error($link));
	 $j = 0;
	 do {
		 ++$j;
	 $coll = mysqli_fetch_row($res); //преобразуем ответ из БД в нормальный массив PHP
	 $arr[$j] = $coll['1']; 
	 $idarr[$j] = $coll['0'];
	 
	 } while ($arr[$j] != null);

   ?>
<div class = "midnav">
<?php
if (isset($_SESSION['delmess'])){
  echo'<div class="msg"> '.$_SESSION['delmess'].' </div>';
  } else {}
  unset ($_SESSION['delmess']);
for ($i = 1; $i < $j; ++$i){
	if ($arr[$i] != null){
		echo'<figure class="caption-shadow"><a href = "films_in coll.php?usid = '.$uid.'&collid='.$idarr[$i].' "><img src="pop.jpg"><figcaption>'.$arr[$i].'</figcaption></a></figure>';
	}
}
?>

</div>

<div class="butt"><button id="btn_modal_window">Создать новую коллекцию</button>
  <div id="my_modal" class="modal">
    <div class="modal_content">
      <span class="close_modal_window">×</span>
	  <div class="form-wrap">
  <form method="post" id = "registerform" action="add_coll_obr.php" name = "registerform">
  <div>
      <label for="name">Введите название вашей коллекции</label>
	  <input type="text" name="collname" required>
    </div>
	<center><input type = "submit" value = "Создать"></center>
	</form>
</div>
    </div>
  </div>
  </div>
 <button><a href = "delete_coll.php"> Удалить коллекции</a> </button>
  <script>
   var modal = document.getElementById("my_modal");
 var btn = document.getElementById("btn_modal_window");
 var span = document.getElementsByClassName("close_modal_window")[0];

 btn.onclick = function () {
    modal.style.display = "block";
 }

 span.onclick = function () {
    modal.style.display = "none";
 }

 window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
  </script>
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
   
