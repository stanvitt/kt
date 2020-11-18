<?php

$title="Главная страница"; // название формы

require "db.php"; // подключаем файл для соединения с БД
echo "<link rel='stylesheet' href='style/styleindex.css'>";
?>




<!-- Если авторизован выведет приветствие -->

<?php if(isset($_SESSION['logged_user'])) : ?>


<div class ="container1">
<center>

<h1>Добро пожаловать в нашу компанию службы доставки грузов!</h1>

</center>
<div class ="container1">
  <ul>
        <li class ="one">  <a href ="zakaz.php">Заказ</a> </li>
          <li class ="two "> <a href ="auto.php">Транспорт</a> </li> 
        
<hr/>
    </ul>
    </div>

    <div class ="pr">
   <div class = "pr"> <p>(Пользователь) Здравствуйте, <?php echo $_SESSION['logged_user']->name; ?> </p>  </div>
<!-- Пользователь может нажать выйти для выхода из системы -->

<a href="logout.php">Выйти</a> <!-- файл logout.php создадим ниже -->
</div>

<?php else : ?>

<!-- Если пользователь не авторизован выведет ссылки на авторизацию и регистрацию -->


<div class="container2">
<center>

<h1>Добро пожаловать в нашу компанию службы доставки грузов!</h1>

</center>
  <ul>
    <li class="one1"><a href="login.php">Авторизоваться</a></li>
 <li class="two2"><a href="signup.php">Зарегистрироваться</a></li>
    <hr/>
  </ul>
</div>

<?php endif; ?>

