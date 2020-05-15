<!-- ВВОД ДАННЫХ СТУДЕНТОВ -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Добавление информации о студентах</title>
<link href="dekanat_styles.css" rel="stylesheet">

</head>
<body>
<h2> База данных "Деканат" </h2> 
<p>Для добавления нового студента в базу, заполните все поля ниже:</p>
<form action="insert.php" method="post">

<div class="adding" style="width: 302px">

   <div class="field">
        <label for="lastName">Фамилия:</label>
        <input type="text" name="surname" required pattern="^[А-Яа-яЁё-]+$" title="Допустимы только буквы русского алфавита и символ дефиса" >
    </div>
    <div class="field">
    
        <label for="firstName">Имя:</label>
        <input type="text" name="name" required pattern="^[А-Яа-яЁё-]+$" title="Допустимы только буквы русского алфавита и символ дефиса">
    </div>

    <div class="field">
        <label for="Patronymic">Отчество:</label>
        <input type="text" name="patronymic" required pattern="^[А-Яа-яЁё-]+$" title="Допустимы только буквы русского алфавита и символ дефиса">
    </div>
  <div class="field">
        <label for="admissionyaer">Год поступления:</label>
        <input type="text" name="admissoin_year" required pattern="20[0-9]{2}" title="Допустимо число в формате 20xx, где х - цифры">
   </div>
 <div class="field">
        <label for="group">Номер группы:</label>
        <input type="text" name="group_num" required pattern="[0-9]{1,6}" title="Допустимо число длиной не более 6 цифр">
    </div>
        <div class="field"><label for="education_form_id">Форма обучения:</label><select name="education_form_id">
    <option value="1">Очная</option>
    <option value="2">Заочная</option>
    <option value="3">Очно-заочная</option>
   </select> 
  </div>


    <input type="submit" value="Подтвердить" class="button">


    </div>
</form>
    <p><a href="index.php"><input type="button" value="На главную"></a></p>
</body>

</html>
