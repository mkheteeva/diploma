<!Doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>MovieCamp</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css" >
	<link rel="shortcut icon" href="little_logo.png" type="image/x-icon">
	<script src="https://kit.fontawesome.com/e4d26e9cd6.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link rel="stylesheet" href="https://bootstraptema.ru/plugins/font-awesome/4-4-0/font-awesome.min.css" />
<script src="https://bootstraptema.ru/plugins/jquery/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://bootstraptema.ru/plugins/2015/b-v3-3-6/bootstrap.min.js"></script>
<script src="https://bootstraptema.ru/_sf/3/394.js" type="text/javascript"></script>
  </head>
<header>
  <div class="topnav">
  <logot><a = href="mainpage.html"><img src = "little_logo.png" alt = "На главную" width = "75" height = "60"/></a></logot>
  <a  href = "reg_aut.php">Регистрация</a>
  <a  href = "reg_aut.php">Вход</a>
  <a href="#contact">Контакты</a>
  <a href="#about">О нас</a>
  <life> <a> Life is better with a good movie </a> </life>
  </div>
  </header>
  <div class = "im"><center><img src="logo.png" width="500" height="250" alt="MovieCamp" align = "top" /> </center>
</div> 
 <div class="modal fade login" id="loginModal">
 <div class="modal-dialog login animated">
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 <h4 class="modal-title">Вход</h4>
 </div>
 <div class="modal-body"> 
 <div class="box">
 <div class="content">
 
 <div class="error"></div>
 <div class="form loginBox">
 <form method="" action="" accept-charset="UTF-8">
 <input id="email" class="form-control" required type="text" placeholder="Email" name="email">
 <input id="password" class="form-control" required type="password" placeholder="Password" name="Пароль">
 <a href = "kabinet.html"><input class="btn btn-default btn-login" type="button" value="Войти" onclick="loginAjax()"> </a>
 </form>
 </div>
 </div>
 </div>
 <div class="box">
 <div class="content registerBox" style="display:none;">
 <div class="form">
 <form method="" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
 <input id="email" class="form-control" type="text" placeholder="Email" name="email">
 <input id="password" class="form-control" type="password" placeholder="Password" name="password">
 <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
 <a href = "register.html"><input class="btn btn-default btn-register" type="button" value="Зарегистрироваться" name="commit"> </a>
 </form>
 </div>
 </div>
 </div>
 </div>
 <div class="modal-footer">
 <div class="forgot login-footer">
 <span>Впервые у нас? 
 <a href="javascript: showRegisterForm();">Зарегистрируйтесь!</a>
 </span>
 </div>
 <div class="forgot register-footer" style="display:none">
 <span>У вас уже есть аккаунт?</span>
 <a href="javascript: showLoginForm();">Войдите!</a>
 </div>
 </div> 
 </div>
 </div>
 </div>

<script>
 $(document).ready(function(){
 openLoginModal(); 
 });
</script>
<body>
   <ggg><center> Добро пожаловать в наш КиноЛагерь!  </center></ggg>
  <center><p><gg> Привет, Дорогой друг! </gg></p> </center>
  <div class = "text_hi"><hh>Мы рады видеть тебя на приветственной странице нашего КиноЛагеря! КиноЛагерь  - это место, в котором все киноманы смогут смотреть самые свежие новинки
  кино, а так же находить для себя кино, ставшее культовым в истории всемирного кинематографа и добавлять их в свои коллекции для просмотра. Здесь ты сможешь обмениваться сообщениями
с другими пользователями, а так же делиться любимым фильмом, мульфильмом или сериалом в сообщении! А если тебе вдруг стало нечего смотреть или ты не знаешь, что нового вышло в мире кинематографа,
что могло бы тебе понравиться, то можешь не переживать! Наш онлайн-робот, твой верный друг Кампик, поможет тебе в этом не простом вопросе! Он будет предлагать тебе, что посмотреть из новинок кино и 
не только, и тебе обязательно понраятся его предложения! Ведь он предлагает тебе только то, что тебе нравится! </hh> </div>

<center><iframe src="https://giphy.com/embed/WT8pzD8MgX2cPgzejY" width="400" height="320" frameBorder="0"  class="giphy-embed" allowFullScreen></iframe></center>
<div class = "text_hi" > <center> <h3> Скорее заходи в КиноЛагерь! </h3> </center> </div>

</body>
<a href="reg_aut.php" class="bott"><p><hg> Вход </hg></p> </a>
<div class = "footer">
<center><p><h4> Мы в социальных сетях: </h4></p></center>
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
</html>