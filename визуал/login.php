<?php

$title="Форма авторизации"; // название формы

require "db.php"; // подключаем файл для соединения с БД
echo "<link rel='stylesheet' href='style/stylelog.css'>";
?>



<!-- Форма авторизации -->
<div> </div>
<section class ="content">
<h2>Авторизуйтесь</h2>

<form action="login.php" method="post">

<input type="text" class="form-control" name="login" id="login" placeholder="Логин" required><br>


<input type="password" class="form-control" name="password" id="pass" placeholder="Пароль" required><br>

<button class="in" name="do_login" type="submit">Войти</button>

</form>

<br>

<button class="reg"> <a class ="reghr" href="signup.php">Регистрация</a></button>


<div class ="back"> <a href="index.php">  <img src="arrow.svg"> </a> </div>
<img class ="dop" src="logdop.svg" alt="">
</section> 


<?php
// Создаем переменную для сбора данных от пользователя по методу POST

$data = $_POST;

// Пользователь нажимает на кнопку "Авторизоваться" и код начинает выполняться

if(isset($data['do_login'])) {

// Создаем массив для сбора ошибок

$errors = array();

// Проводим поиск пользователей в таблице users

$user = R::findOne('users', 'login = ?', array($data['login']));

if($user->status == 2) {
    // Если логин существует, тогда проверяем пароль
    if(password_verify($data['password'], $user->password)) {
        $_SESSION['logged_user'] = $user;
        header('Location: index.php');
    } else {
       $errors[] = 'Пароль неверно введен!';
    }

} elseif ($user->status == 1) {
    if(password_verify($data['password'], $user->password)) {
        $_SESSION['logged_user'] = $user;
        header('Location: adminindex.php');
    } else {
       $errors[] = 'Пароль неверно введен!';
    }
} else {
    $errors[] = 'Пользователь с таким логином не найден!';
}

if(!empty($errors)) {

echo '<div style="color: red; ">' . array_shift($errors). '</div><hr>';

}

}
?>