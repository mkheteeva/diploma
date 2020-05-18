<!Doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>MovieCamp</title>
	<link rel="stylesheet" type="text/css" href="find_style.css" >
	<link rel="stylesheet" type="text/css" href="f_st.css" >
<link rel="stylesheet" type="text/css" href="poisk.css" >
	<link rel="shortcut icon" href="little_logo.png" type="image/x-icon">
	<script src="https://kit.fontawesome.com/e4d26e9cd6.js" crossorigin="anonymous"></script>
	
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/font-awesome/4-4-0/font-awesome.min.css" />
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://bootstraptema.ru/plugins/2015/b-v3-3-6/bootstrap.min.js"></script>
<script src="https://bootstraptema.ru/_sf/3/394.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  </head>
  <header>
  <div class="topnav">
  <logot><a  href="kabinet.php"><img src = "little_logo.png" alt = "На главную" width = "75" height = "60"/></a></logot>
  <a  href="messages.php">Мои сообщения</a>
  <a href="collections.php">Мои коллекции</a>

   <logotwo> <a><img src = "user.png" alt = "Пользователь" width = "35" height = "35"/></a></logotwo>
   <search> <a class="active" href = "find.html"> Поиск </a> </search>
   <life> <a> Life is better with a good movie </a> </life>
   </header>
   <?php
   session_start();
	header( 'Content-Type: text/html; charset=utf8');
	require_once 'connection.php'; // подключаем скрипт
	$link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     mysqli_set_charset($link, "utf8");
	 
	$uid =  $_SESSION['us_id']; //мой идентификатор
   
   $getcont = 'SELECT * FROM kind_of_content';
   $res=mysqli_query($link, $getcont) or die("Ошибка " . mysqli_error($link));
	$num = mysqli_num_rows($res);
	for ($i = 0; $i < $num; ++$i){
		$contenttype = mysqli_fetch_array($res); 
		$content[] = $contenttype['Name'];
	}
	
   $getgenre = 'SELECT * FROM genres';
   $result=mysqli_query($link, $getgenre) or die("Ошибка " . mysqli_error($link));
   $numgenre = mysqli_num_rows($result);
	for ($i = 0; $i < $numgenre; ++$i){
		$genres = mysqli_fetch_array($result); 
		$genre[] = $genres['Name'];
	}
   
   
   ?>
   <body>
   
   <div class="navigation-menu js-nav-menu">
  <div class="navigation-menu__toggle js-nav-menu-toggle">
    <span class="navigation-menu__bars"></span>
  </div>
  
  <ul class="menu-list">
  <div class = "menu">
  <?php
  for($i = 0; $i< $num; ++$i){
    echo'<div class="genre_item">'.$content[$i].'</div>';
  }
  for($i = 0; $i< $numgenre; ++$i){
    echo'<div class="genre_item">'.$genre[$i].'</div>';
  }
  ?>
	</div>
  </ul>

</div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

    <script src="index.js"></script>
<div class="poster"><img src = "zov.jpg" width = "250" height = "400"/></div>

<a href="find_user.php"><div class="but">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  Что посмотреть?
</div></a>
<div id="cover">
  <form method="post" action="find_users.php">
    <div class="tb">
      <div class="td"><input type="text" name="username" placeholder="Введите имя или фамилию пользователя " required></div>
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
if(isset($_POST['username']) or isset($_GET['word'])){
	if(isset($_POST['username'])){
	$username = htmlspecialchars($_POST['username']);
	} else {
		$username = htmlspecialchars($_GET['word']);
	}
	$getuser = 'SELECT * FROM users WHERE Name LIKE "%'.$username.'%" OR Surname LIKE "%'.$username.'%"';
	$resultt = mysqli_query($link, $getuser) or die("Ошибка " . mysqli_error($link));
   $numer = mysqli_num_rows($resultt);
   
   for($j=0; $j<$numer; ++$j){
	   $named = mysqli_fetch_array($resultt);
	   $usname[] = $named['Name'];
	   $ussrnm[] = $named['Surname'];
		$ussid[] = $named['id'];
		$usimage[] = $named['image'];
		$ussex[] = $named['Sex'];
   }
   
   
   if($numer <= 5 ){
   for($k = 0; $k < $numer; ++$k){
	   if($ussid[$k]!= $uid){
   echo'<div class="result">
<img src = "data:image;base64, '.$usimage[$k].'" />

<name>'.$usname[$k].' '.$ussrnm[$k].' </name>
<div><genre><b> Пол: </b>'.$ussex[$k].'</genre></div> 
<div> <genre><a href = "writemess.php?sobid='.$ussid[$k].'">Написать </a></genre></div>
</div>';
	   }
   }
   } else {
	   if ($numer % 5 ==0){
		   $numofpages = intdiv($numer,5);
	   } else{
		   $numofpages = intdiv($numer,5)+1;
	   }
	   if(isset($_GET['page'])){
		   
		   $page = $_GET['page'];
	   } else {
		   $page = 1;
	   }
	   for ($k = 0; $k < 5; ++$k){
		   $k = $k + ($page-1)*5;
		   if($k <= $numer){
			    if($ussid[$k]!= $uid){
		    echo'<div class="result">
<img src = "data:image;base64, '.$usimage[$k].'" />

<name>'.$usname[$k].' '.$ussrnm[$k].' </name>
<div><genre><b> Пол </b>'.$ussex[$k].'</genre></div> 
<div> <genre><a href = "writemess.php?sobid='.$ussid[$k].'">Написать </a></genre></div>
</div>';
				}
		   }
	   }
	   for($z = 1; $z <= $numofpages; ++$z){
		   if($z != $page ){
			   echo'<div class = "numeration"><a href = "find.php?page='.$z.'&word='.$username.'">'.$z.'</a>';
		   }
	   }
   }
   
   
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