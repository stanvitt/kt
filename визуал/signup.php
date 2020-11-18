<?php

$title="Форма регистрации"; // название формы


require "db.php"; // подключаем файл для соединения с БД
echo "<link rel='stylesheet' href='style/stylesig.css'>";
?>


<!-- Форма регистрации -->
<div class="container">


	<h1 class="zag">Регстрация</h1>
	<form  action = "signup.php" method="post" class="registration-form"> 
		<label class="col-one-half">
			<span class="label-text">Имя</span>
			<input type="text" name="name">
		</label>
		<label class="col-one-half">
			<span class="label-text">Фамилия</span>
			<input type="text" name="family">
		</label>
		<label>
			<span class="label-text">E-mail</span>
			<input type="text" name="email">
		</label>
		<label>
			<span class="label-text">Логин</span>
			<input type="text" name="login">
		</label>
		<label class="password">
			<span class="label-text">Пароль</span>
			<input type="password" name="password">
        </label>
        <label class="password">
			<span class="label-text">Повторите пароль</span>
			<input type="password" name="password_2">
		</label>
		
		<button class ="back">   <a href="index.php"> На главную </button>
			<button class="submit" name="signup" type ="submit">Зарегистрироваться</button>
			
	</form>
</div>


<?php
// Создаем переменную для сбора данных от пользователя по методу POST

$data = $_POST;

// Пользователь нажимает на кнопку "Зарегистрироватьcя" и код начинает выполняться

if(isset($data['signup'])) {

// Регистрируем

// Создаем массив для сбора ошибок

$errors = array();

// Проводим проверки

// trim — удаляет пробелы (или другие символы) из начала и конца строки

if(trim($data['login']) == '') {

$errors[] = "Введите логин!";

}

if(trim($data['email']) == '') {

$errors[] = "Введите Email";

}

if(trim($data['name']) == '') {

$errors[] = "Введите Имя";

}

if(trim($data['family']) == '') {

$errors[] = "Введите фамилию";

}

if($data['password'] == '') {

$errors[] = "Введите пароль";

}

if($data['password_2'] != $data['password']) {

$errors[] = "Повторный пароль введен не верно!";

}

// функция mb_strlen - получает длину строки

// Если логин будет меньше 5 символов и больше 90, то выйдет ошибка

if(mb_strlen($data['login']) < 5 || mb_strlen($data['login']) > 90) {

$errors[] = "Недопустимая длина логина";

}

if (mb_strlen($data['name']) < 3 || mb_strlen($data['name']) > 50){

$errors[] = "Недопустимая длина имени";

}

if (mb_strlen($data['family']) < 5 || mb_strlen($data['family']) > 50){

$errors[] = "Недопустимая длина фамилии";

}

if (mb_strlen($data['password']) < 2 || mb_strlen($data['password']) > 8){

$errors[] = "Недопустимая длина пароля (от 2 до 8 символов)";

}

// проверка на правильность написания Email

if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $data['email'])) {

$errors[] = 'Неверно введен е-mail';

}

// Проверка на уникальность логина

if(R::count('users', "login = ?", array($data['login'])) > 0) {

$errors[] = "Пользователь с таким логином существует!";

}

// Проверка на уникальность email

if(R::count('users', "email = ?", array($data['email'])) > 0) {

$errors[] = "Пользователь с таким Email существует!";

}

if(empty($errors)) {

// Все проверено, регистрируем

// Создаем таблицу users

$user = R::dispense('users');

// добавляем в таблицу записи

$user->login = $data['login'];

$user->email = $data['email'];

$user->name = $data['name'];

$user->family = $data['family'];

$user->status = 2;

// Хешируем пароль

$user->password = password_hash($data['password'], PASSWORD_DEFAULT);

// Сохраняем таблицу

R::store($user);

echo '<div style="color: green; ">Вы успешно зарегистрированы! Можно <a href="login.php">авторизоваться</a>.</div><hr>';

} else {

// array_shift() извлекает первое значение массива array и возвращает его, сокращая размер array на один элемент.

echo '<div style="color: red; ">' . array_shift($errors). '</div>';

}

}
?>