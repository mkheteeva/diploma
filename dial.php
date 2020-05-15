<!Doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>MovieCamp</title>
	<style>
	

</style>
	<link rel="stylesheet" type="text/css" href="dial_st.css" >
	<link rel="stylesheet" type="text/css" href="dialogs.css" >
	<link rel="stylesheet" type="text/css" href="dialog.css" >
		<link rel="stylesheet" type="text/css" href="modal_st.css" >
	<link rel="shortcut icon" href="little_logo.png" type="image/x-icon">
	<script src="https://kit.fontawesome.com/e4d26e9cd6.js" crossorigin="anonymous"></script>
	
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/font-awesome/4-4-0/font-awesome.min.css" />
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://bootstraptema.ru/plugins/2015/b-v3-3-6/bootstrap.min.js"></script>
<script src="https://bootstraptema.ru/_sf/3/394.js" type="text/javascript"></script>
  </head>
  <header>
  <div class="topnav">
  <logot><a  href="kabinet.php"><img src = "little_logo.png" alt = "На главную" width = "75" height = "60"/></a></logot>
  <a class="active" href="messages.php">Мои сообщения</a>
  <a href="collections.php">Мои коллекции</a>

   <logotwo> <a><img src = "user.png" alt = "Пользователь" width = "35" height = "35"/></a></logotwo>
   <search> <a href = "find.html"> Поиск </a> </search>
   <life> <a> Life is better with a good movie </a> </life>
   </header>
   <script type="text/javascript">

            window.onload = function(){

                document.getElementById('messages').scrollTop = 9999;

            }
</script>
   <?php
   
    session_start(); //otkrili sessiju
    header( 'Content-Type: text/html; charset=utf8');
require_once 'connection.php'; // подключаем скрипт

 $uid =  $_SESSION['us_id'];//мой айди

$convid = $_GET['convid'];//айди собеседника

   
   $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     mysqli_set_charset($link, "utf8");
	
$getdialog = 'SELECT
        id,
        unread,
		sender
    FROM
        dialogs
    WHERE
        (id_one = "'.$uid.'" AND id_two = "'.$convid.'")
            OR
        (id_one = "'.$convid.'" AND id_two = "'.$uid.'")';	
	$res=mysqli_query($link, $getdialog) or die("Ошибка " . mysqli_error($link));
	$idd = mysqli_fetch_array($res);
	
	$getmessages = 'SELECT
            id,
            Text,
            sender_id
        FROM 
            messages
        WHERE
            convers_id = "'.$idd['id'].'"
            AND
            CASE
                WHEN sender_id = "'.$uid.'"
                    THEN sender_del = "0"
                WHEN address_id = "'.$uid.'"
                    THEN address_del = "0"
            END
        ORDER BY 
            id
        ASC';
		$result=mysqli_query($link, $getmessages) or die("Ошибка " . mysqli_error($link));
	$rows = mysqli_num_rows($result);
	
	for($i = 0; $i<$rows;++$i){
		$message = mysqli_fetch_array($result);
		$mess[]= $message['Text'];
		$sender[] = $message['sender_id'];
	}
	
	if(($idd['sender'] != $uid) AND ($idd['unread'] != 0))
	{
		$setquery = 'UPDATE dialogs SET unread = "0" WHERE id = "'.$idd['id'].'"';
		$ress = mysqli_query($link, $setquery) or die("Ошибка " . mysqli_error($link));
	}

   ?>
   
   <body>
   
   <div>
   <a class="arrow-3" href="mess.php">
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
<div>
  <div class="color-border">
    <img src="joker.jpg">
</div> 
<div class="messages" id= "messages">
<?php
for ($k= 0; $k<$rows;++$k){
if($sender[$k] == $uid){echo'<div class="block">'.$mess[$k].'</div>';}
else{
	echo'<div class="block2">'.$mess[$k].'</div>';
	}
}
?>
</div>
</div>

<div class= "dontroll">
<a href="#openModal"><film> Прикрепить фильм </film></a>
<div id="openModal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Название</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    
        <p>Содержимое модального окна...</p>
      </div>
    </div>
  </div>
</div>
<form action="textmess_obr.php" method="post">
<textarea placeholder = "Введите сообщение" name="mymessage"></textarea>
<button class="mail-btn" type="submit">Отправить</button>
<form>
</div>
</div>
<script>

$(".mail-btn").on("click touchstart", function () {
    $(this).addClass("fly");
    that = this
    setTimeout(function() {
        $(that).removeClass("fly");
    }, 5400)
});
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
