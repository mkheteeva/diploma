<!Doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>MovieCamp</title>

	<link rel="stylesheet" type="text/css" href="meeage.css" >
	<link rel="stylesheet" type="text/css" href="mess.css" >
	<link rel="shortcut icon" href="little_logo.png" type="image/x-icon">
	<script src="https://kit.fontawesome.com/e4d26e9cd6.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
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
 <body>  
 <?php
  session_start(); //otkrili sessiju
   header( 'Content-Type: text/html; charset=utf8');
require_once 'connection.php'; // подключаем скрипт

   $uid =  $_SESSION['us_id'];
   
   $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     mysqli_set_charset($link, "utf8");
   $query = 'SELECT
    users.id as userId,
    users.Name,
	users.Surname,
    dialogs.id as convId,
    dialogs.sender,
    dialogs.unread,
    messages.Text,
    messages.Time,
	users.image
FROM
    users,
    dialogs
LEFT JOIN
    messages ON (dialogs.last_mess = messages.id)
WHERE
    (dialogs.id_one = "'.$uid.'" OR dialogs.id_two = "'.$uid.'")
    AND
    CASE
        WHEN dialogs.id_one = "'.$uid.'"
            THEN dialogs.id_two = users.id AND dialogs.first_delete = "0"
        WHEN dialogs.id_two = "'.$uid.'"
            THEN dialogs.id_one = users.id AND dialogs.second_delete = "0"
    END
ORDER BY
    dialogs.unread
ASC';

$res=mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
$rows = mysqli_num_rows($res); // количество полученных строк
$z = 0;
if(isset($_POST['dialogname'])){
	$dialogname = htmlspecialchars($_POST['dialogname']);
	$dial = explode(' ', $dialogname);

	for ($i = 0; $i< $rows; ++$i)
{
	$coll = mysqli_fetch_array($res); //преобразуем ответ из БД в нормальный массив PHP
	if(strcmp($coll['Name'],$dial[0])==0){
		$names[] = $coll['Name'];
	$images[] = $coll['image'];
	$lm[] = $coll['Text'];
	$srnm[] = $coll['Surname'];
	$time[] = $coll['Time'];
	$sender[] = $coll['sender'];
	$conversations[] = $coll['convId'];
	$idsob[] = $coll['userId'];
	$unread[] = $coll['unread'];
		++$z;
	}
	
}
} else {
for ($i = 0; $i< $rows; ++$i)
{
	$coll = mysqli_fetch_array($res); //преобразуем ответ из БД в нормальный массив PHP
	$names[] = $coll['Name'];
	$images[] = $coll['image'];
	$lm[] = $coll['Text'];
	$srnm[] = $coll['Surname'];
	$time[] = $coll['Time'];
	$sender[] = $coll['sender'];
	$conversations[] = $coll['convId'];
	$idsob[] = $coll['userId'];
	$unread[] = $coll['unread'];
	++$z;
}
}
for ($n = 0; $n < $z; ++$n){
$qname = 'SELECT Name FROM users WHERE id = "'.$sender[$n].'"'; //это чтобы в сообщении было видно кто отправил сообщение
$result=mysqli_query($link, $qname) or die("Ошибка " . mysqli_error($link));
$na = mysqli_fetch_array($result); //преобразуем ответ из БД в нормальный массив PHP
$sendnames[] = $na['Name'];
}

//var_dump($sendnames);
//var_dump($sender);
 ?>
<a href="#"><div class="but">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  Написать сообщение
</div></a>
<div id="cover">
  <form method="post" action="mess.php">
    <div class="tb">
      <div class="td"><input type="text" name="dialogname" placeholder="Найти " required></div>
      <div class="td" id="s-cover">
        <button type="submit">
          <div id="s-circle"></div>
          <span></span>
        </button>
      </div>
    </div>
  </form>
</div>

<?php

if ($rows == 0){
	echo'Диалогов пока нет';
}
else{
for ($k =0; $k< $z; ++$k){
	if($sender[$k] != $uid ){
		if($unread[$k]!=0){
			echo'<div class = "cont">
<figure>
  <p><img src="data:image;base64, '.$images[$k].'"
    width="100" height="110"
    alt="Эйфелева башня">
  <figcaption>'.$names[$k].' '.$srnm[$k].'</figcaption>
</figure>
<a href="#" class="close"></a>
<div class="hh2"><a href = "dial.php?convid='.$idsob[$k].' "><h3>'.$time[$k].'</h3><name> '.$sendnames[$k].':</name> '.$lm[$k].' </a></div>
<hg>'.$unread[$k].'</hg>
</div>';
		} else {		
echo'<div class = "cont">
<figure>
  <p><img src="data:image;base64, '.$images[$k].'"
    width="100" height="110"
    alt="Эйфелева башня">
  <figcaption>'.$names[$k].' '.$srnm[$k].'</figcaption>
</figure>
<a href="#" class="close"></a>
<div class="hh"><a href = "dial.php?convid='.$idsob[$k].' "><h3>'.$time[$k].'</h3><name> '.$sendnames[$k].':</name> '.$lm[$k].' </a></div>
</div>';
		}
	} else {		
echo'<div class = "cont">
<figure>
  <p><img src="data:image;base64, '.$images[$k].'"
    width="100" height="110"
    alt="Эйфелева башня">
  <figcaption>'.$names[$k].' '.$srnm[$k].'</figcaption>
</figure>
<a href="#" class="close"></a>
<div class="hh"><a href = "dial.php?convid='.$idsob[$k].' "><h3>'.$time[$k].'</h3><name> '.$sendnames[$k].':</name> '.$lm[$k].' </a></div>

</div>';
		}
}
}
?>

</body>
</html>
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
