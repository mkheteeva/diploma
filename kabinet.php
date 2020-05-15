<!Doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>MovieCamp</title>
	<link rel="stylesheet" type="text/css" href="kab_style.css" >
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
  session_start();
header( 'Content-Type: text/html; charset=utf8');
require_once 'connection.php'; // подключаем скрипт

//Если форма авторизации отправлена...
	if ( !empty($_POST['pass']) and !empty($_POST['em']) ) {
		
		$link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     mysqli_set_charset($link, "utf8");
	 
		//Пишем логин и пароль из формы в переменные (для удобства работы):
		$login = $_REQUEST['em'];
		$password = $_REQUEST['pass'];

		/*
			Формируем и отсылаем SQL запрос:
			ВЫБРАТЬ ИЗ таблицы_users ГДЕ поле_логин = $login И поле_пароль = $password.
		*/
		$query = 'SELECT * FROM users WHERE Email="'.$login.'" AND password="'.$password.'"';
		$result = mysqli_query($link, $query); //ответ базы запишем в переменную $result
		$user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP
		$qu = 'SELECT Name FROM users WHERE Email="'.$login.'" AND password="'.$password.'"';
		$result2 = mysqli_query($link, $qu); //ответ базы запишем в переменную $result
		$name = mysqli_fetch_array($result2); //преобразуем ответ из БД в нормальный массив PHP
		//Если база данных вернула не пустой ответ - значит пара логин-пароль правильная
		if (!empty($user)) {
		} else {
			$_SESSION ['message'] = 'Неправильный логин или пароль';
			$URL="reg_aut.php";
			header ("Location: $URL");
		}
	} 
 
	if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirmation']) && isset($_POST['dateofb'])){
		
		$link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     mysqli_set_charset($link, "utf8");
	 
	 $emal=htmlspecialchars($_POST['email']);
	 $passw=htmlspecialchars($_POST['password']);
	 $quer = 'SELECT * FROM users WHERE Email="'.$emal.'" AND password="'.$passw.'"';
	 $res = mysqli_query($link, $quer); //ответ базы запишем в переменную $result
		$users = mysqli_fetch_assoc($res); //преобразуем ответ из БД в нормальный массив PHP
	 if (!empty($users)) { 
	 $_SESSION ['message2'] = 'Аккаунт с такой электронной почтой или с таким паролем уже существует!';
	 $URL="reg_aut.php";
	 header ("Location: $URL");
	 echo'Аккаунт с такой электронной почтой или с таким паролем уже существует!';
		} else {
		
	if($_POST['password'] != $_POST['password_confirmation']) {
		$_SESSION ['message3'] = 'Пароли не совпадают';
			$URL="reg_aut.php";
			header ("Location: $URL");
            echo 'Пароли не совпадают';
	} 
	else {
		$image = addslashes($_FILES['image_post']['tmp_name']);
		$name = addslashes($_FILES['image_post']['name']);
		$image = file_get_contents($image);
		$image = base64_encode($image);
		$nam= htmlspecialchars($_POST['name']);
		$surname = htmlspecialchars($_POST['surname']);
		$email=htmlspecialchars($_POST['email']);
		$password=htmlspecialchars($_POST['password']);
		$dateofb=htmlspecialchars($_POST['dateofb']);
		$sex = htmlspecialchars($_POST['sex']);
 
 $sql="INSERT INTO users
  (Name, Surname, Email,password, Date_of_birth,Sex,im_name,image)
	VALUES('$nam','$surname', '$email', '$password', '$dateofb', '$sex','$name','$image')";
  $result=mysqli_query($link, $sql) or die("Ошибка " . mysqli_error($link));
  $qq = 'SELECT Name FROM users WHERE Email="'.$email.'" AND password="'.$password.'"';
  $result3=mysqli_query($link, $qq) or die("Ошибка " . mysqli_error($link));
  $name = mysqli_fetch_array($result3); //преобразуем ответ из БД в нормальный массив PHP
  $qq2 = 'SELECT * FROM users WHERE Email="'.$email.'"';
  $result4=mysqli_query($link, $qq2) or die("Ошибка " . mysqli_error($link));
  $user = mysqli_fetch_array($result4); //преобразуем ответ из БД в нормальный массив PHP
 
	}
	}
	}
	$_SESSION ['us_id'] = $user['id'];
	 $qq = 'SELECT content_ed.Poster, last_movies.id, content_ed.Name FROM content_ed JOIN last_movies ON content_ed.id = last_movies.film_id WHERE last_movies.user_id = "'.$user['id'].'"';
	 $res=mysqli_query($link, $qq) or die("Ошибка " . mysqli_error($link));
	 $j = 0;
	 do {
		 ++$j;
	 $coll = mysqli_fetch_row($res); //преобразуем ответ из БД в нормальный массив PHP
	 $arr[$j] = $coll['1']; 
	 $idarr[$j] = $coll['0'];
	 
	 } while ($arr[$j] != null);
	?>
  <header>
  <div class="topnav">
  <logot><a  href="kabinet.php"><img src = "little_logo.png" alt = "На главную" width = "75" height = "60"/></a></logot>
  <a href="mess.php">Мои сообщения</a>
  <a href="collections.php">Мои коллекции</a>
<search><a href = "mainpage.php">Выход </a></search>
   <logotwo> <a><?php echo '<img src="data:image;base64, '.$user['image'].'" width = "60" height = "60">'?></a></logotwo>
   <search> <a href = "find.html"> Поиск </a> </search>
   <life> <a> Life is better with a good movie </a> </life>
   
   </header>
   <body> 
   <div class = "block_hi">
   <?php echo"<gg> Привет, $name[Name]! </gg>" ?>
   </div>
   
   <gg1>Вы недавно смотрели:</gg1>
   
   <div class = "midnav">
 <?php
 for ($i = 1; $i < $j; ++$i){
	if ($arr[$i] != null){
		echo'<a href = "#"><img src="'.$idarr[$i].'"></a>';
	}
 }
	?>
   </div>
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