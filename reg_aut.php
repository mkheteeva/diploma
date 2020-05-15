<!Doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>MovieCamp</title>
	<style>
	input [type =submit] {
  text-decoration: none;
  outline: none;
  display: inline-block;
  width: 200px;
  height: 45px;
  line-height: 45px;
  border-radius: 45px;
  margin: 10px 20px;
  font-family: 'Montserrat', sans-serif;
  font-size: 11px;
  text-transform: uppercase;
  text-align: center;
  letter-spacing: 3px;
  font-weight: 600;
  color: white;
  background: white;
  box-shadow: 0 8px 15px rgba(0,0,0,.1);
  transition: .3s;
  font-weight: bold;
  padding-bottom: 50px;
}
input [type=submit]:hover {
  background: #6A92D4;
  box-shadow: 0 15px 20px rgba(46,229,157,.4);
  color: #fff;
  transform: translateY(-7px);
}
	</style>
	<link rel="stylesheet" type="text/css" href="register_style.css" >
	<link rel="stylesheet" type="text/css" href="ra_style.css" >
	<link rel="shortcut icon" href="little_logo.png" type="image/x-icon">
	<script src="https://kit.fontawesome.com/e4d26e9cd6.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/font-awesome/4-4-0/font-awesome.min.css" />
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://bootstraptema.ru/plugins/2015/b-v3-3-6/bootstrap.min.js"></script>
<script src="https://bootstraptema.ru/_sf/3/394.js" type="text/javascript"></script>
<script src = "reg_aut.js" type="text/javascript"></script>
  </head>
  <header>
  <div class="topnav">
  <logot><a = href="mainpage.html"><img src = "little_logo.png" width = "75" height = "60"/></a></logot>
  <life> <a> Life is better with a good movie </a> </life>
  </div>
  </header>
  <body>
  <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Авторизация')">Авторизация</button>
  <button class="tablinks" onclick="openCity(event, 'Регистрация')">Регистрация</button>
</div>
<div id="Авторизация" class="tabcontent">
  <div class="form-wrap">
  <form method="post" id = "registerform" action="kabinet.php" name = "registerform">
  <?php
  session_start();
  if (isset($_SESSION['message'])){
  echo'<div class="msg"> '.$_SESSION['message'].' </div>';
  } else {}
  unset ($_SESSION['message']);
    
  ?>
  <div>
      <label for="name">Электронная почта</label>
  <input type="text" name="em" required>
    </div>
	<div>
      <label for="surname">Пароль</label>
      <input type="text" name="pass" required>
    </div>
	<center><input type = "submit" value = "Войти"></center>
</form>
</div>
</div>
<div id="Регистрация" class="tabcontent">
   <div class="form-wrap">
  
   <form method="post" id = "registerform" action="kabinet.php" name = "registerform" enctype="multipart/form-data">
   <?php
  if (isset($_SESSION['message2'])){
  echo'<div class="msg"> '.$_SESSION['message2'].' </div>';
  } else {}
  unset ($_SESSION['message2']);

  if (isset($_SESSION['message3'])){
  echo'<div class="msg"> '.$_SESSION['message3'].' </div>';
  } else {}
  unset ($_SESSION['message3']);
  ?>
   <div class="profile"><img src="user.png" width = "130" height = "100"/> </div>
   <input type="file"name="image_post">
    <div>
      <label for="name">Имя</label>
      <input type="text" name="name" required>
    </div>
	<div>
      <label for="surname">Фамилия</label>
      <input type="text" name="surname" required>
    </div>
	<div>
      <label for="email">Электронная почта</label>
      <input type="text" name= "email" required>
    </div>
	<div>
      <label for="password">Пароль</label>
      <input type="text" name="password" required>
    </div>
	<div>
      <label for="password_confirmation">Повторите пароль</label>
      <input type="text" name="password_confirmation" required>
    </div>
	<div>
	<label><span>Дата рождения</span><input type="text" id="datepicker" name= "dateofb"></label>
	</div>
	<div class="radio">
      <span><fat>Пол</fat></span>
      <label>
        <input type="radio" name="sex" value="мужской"><hh>мужской</hh>
        <div class="radio-control male"></div>
      </label>
	  <label>
        <input type="radio" name="sex" value="женский"><hh>женский</hh>
        <div class="radio-control female"></div>
      </label>
	  </div>
	  <span><fat1> Фильм, сериал или мультфильм?</fat1> </span>
	  <label class="container"><hh>Фильм</hh>
  <input type="checkbox" name = "Film" value = "Фильм">
  <span class="checkmark"></span>
</label>

<label class="container" ><hh>Сериал</hh>
  <input type="checkbox" name = "Serial" value = "Сериал">
  <span class="checkmark"></span>
</label> 

<label class="container"><hh>Мультфильм</hh>
  <input type="checkbox" name = "Cartoon" value = "Мультфильм">
  <span class="checkmark"></span>
</label> 

<span><fat1> Выберите жанры, которые Вам больше всего импонируют:</fat1> </span>
 <div class = "leftcol">
 <label class="container"><hh>Детский</hh>
  <input type="checkbox" name = "детский">
  <span class="checkmark"></span>
</label>
 <label class="container"><hh>Боевик</hh>
  <input type="checkbox" name = "боевик">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Комедия</hh>
  <input type="checkbox" name = "комедия">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Детектив</hh>
  <input type="checkbox" name = "детектив">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Короткометражный</hh>
  <input type="checkbox" name = "короткометражный">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Мюзикл</hh>
  <input type="checkbox" name = "мюзикл">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Семейный</hh>
  <input type="checkbox" name = "семейный">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Спорт</hh>
  <input type="checkbox" name = "спорт">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Фантастика</hh>
  <input type="checkbox" name = "фантастика">
  <span class="checkmark"></span>
  </label>
  <label class="container"><hh>Кино болливуда</hh>
  <input type="checkbox" name = "кино болливуда">
  <span class="checkmark"></span>

</label>

</div>

<div class = "leftcol">
<label class="container"><hh>Мистика</hh>
  <input type="checkbox" name = "мистика">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Триллер</hh>
  <input type="checkbox" name = "триллер">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Ужасы</hh>
  <input type="checkbox" name = "ужасы">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Приключения</hh>
  <input type="checkbox" name = "приключения">
  <span class="checkmark"></span>
</label> 
<label class="container"><hh>Военный </hh>
  <input type="checkbox" name = "военный">
  <span class="checkmark"></span>
</label> 
 <label class="container"><hh>Документальный</hh>
  <input type="checkbox" name = "документальный">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Драма</hh>
  <input type="checkbox" name = "драма">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Мелодрама</hh>
  <input type="checkbox"name = "мелодрама">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Фэнтези</hh>
  <input type="checkbox" name = "фэнтези">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Арт-хаус</hh>
  <input type="checkbox" name = "арт-хаус">
  <span class="checkmark"></span>
</label>

</div>
<span><fat1> Выберите эпохи кино, которые Вам больше всего импонируют:</fat1> </span>

<label class="container"><hh>Черно-белое кино</hh>
  <input type="checkbox" name = "черное-белое кино">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Немое кино</hh>
  <input type="checkbox" name = "немое кино">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Советское кино</hh>
  <input type="checkbox" name = "советское кино">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Комикс</hh>
  <input type="checkbox" name = "комикс">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Современное кино</hh>
  <input type="checkbox" name = "современное кино">
  <span class="checkmark"></span>
</label>

<span><fat1> Выберите режиссеров, которые Вам больше всего испонируют:</fat1> </span>
<div class = "leftcol">
<label class="container"><hh>Стивен Спилберг</hh>
  <input type="checkbox" name = "стивен спилберг">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Стэнли Кубрик</hh>
  <input type="checkbox" name = "стэнли кубрик">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Квентин Тарантино</hh>
  <input type="checkbox" name = "квентин тарантино">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Вуди Аллен</hh>
  <input type="checkbox" name = "вуди аллен">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Джеймс Кэмерон</hh>
  <input type="checkbox" name = "джеймс кэмерон">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Дэвид Финчер</hh>
  <input type="checkbox" name = "дэвид финчер">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Мартин Скорсезе</hh>
  <input type="checkbox" name = "мартин скорсезе">
  <span class="checkmark"></span>
</label>
</div>

<div class = "leftcol">
<label class="container"><hh>Кристофер Нолан</hh>
  <input type="checkbox" name = "кристофер нолан">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Питер Джексон</hh>
  <input type="checkbox" name = "питер джексон">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Тимур Бекмамбетов</hh>
  <input type="checkbox" name = "тимур бекмамбетов">
  <span class="checkmark"></span>
</label>
<label class="container"><hh>Федор Бондарчук</hh>
  <input type="checkbox" name = "федор бондарчук">
  <span class="checkmark"></span>
</label>
</div>
<center><input type = "submit" value = "Зарегистрироваться"></center>
</form>
</div>
	 
	
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$( function() {
    $( "#datepicker" ).datepicker();
});
</script>
  </div>
  
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
