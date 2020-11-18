<?php

$title="Админ-панель"; // название формы

require "db.php"; // подключаем файл для соединения с БД
echo "<link rel='stylesheet' href='style/styleadindex.css'>";
?>

<center>

<h1>Добро пожаловать в нашу компанию службы доставки грузов!</h1>

</center>


<!-- Если авторизован выведет приветствие -->

<?php if(isset($_SESSION['logged_user'])) : ?>


<div class ="container1">

  <ul>
    <li class ="one"> <a href ="tableadmin/adminotpravitel.php">Отправитель</a> </li>
      <li class ="two">  <a href ="tableadmin/adminpoluch.php">Получатель</a> </li>
        <li class ="three">  <a href ="tableadmin/adminzakaz.php">Заказ</a> </li>
          <li class ="four "> <a href ="tableadmin/adminauto.php">Транспорт</a> </li> 
          <li class = "five"> <a href ="tableadmin/adminvidDost.php">Вид доставки</a> </li>  
          <li class = "six"> <a href ="tableadmin/users.php">Пользователи</a> </li>  
<hr/>
    </ul>
    </div>
    <div class ="pr">
    <p>   (Администратор) Здравствуйте, <?php echo $_SESSION['logged_user']->name ; ?></br> </p>
<!-- Пользователь может нажать выйти для выхода из системы -->

<a href="logout.php">Выйти</a> <!-- файл logout.php создадим ниже -->
</div>

<?php else : ?>

<!-- Если пользователь не авторизован выведет ссылки на авторизацию и регистрацию -->


<div class="container2">
  <ul>
    <li class="one1"><a href="login.php">Авторизоваться</a></li>
 <li class="two2"><a href="signup.php">Зарегистрироваться</a></li>
    <hr/>
  </ul>
</div>

<?php endif; ?>

