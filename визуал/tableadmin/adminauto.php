<?php
	//Устанавливаем доступы к базе данных:
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'root'; //имя пользователя, по умолчанию это root
		$password = ''; //пароль, по умолчанию пустой
		$db_name = 'служба доставки грузов 2'; //имя базы данных

	//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name);

	/*
		Соединение записывается в переменную $link,
		которая используется дальше для работы mysqi_query.
	*/
	
	echo "<link rel='stylesheet' href='../style/styletableadminauto.css'>";
?>
<div class='all'>
<table border = "1" style ="font-size:25px">
<caption>Транспорт</caption>
	<tr>
		<th >ID машины</th>
		<th>Марка</th>
		<th>Цвет</th>
		<th>Номер машины</th>

	</tr>
	</div>
	<?php
		 $sql = mysqli_query($link, 'SELECT `ID машины`, `Марка`,`Цвет`,`Номер машины` FROM `Транспорт`');
		 while ($result = mysqli_fetch_array($sql)) {
		   echo '<tr>' .
				"<td>{$result['ID машины']}</td>" .
				"<td>{$result['Марка']}</td>" .
				"<td>{$result['Цвет']}</td>" .
				"<td>{$result['Номер машины']}</td>" .
	
				"<td><a href='?del_id={$result['ID машины']}'>Удалить</a></td>" .
				'</tr>';
		 }
		 if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
			 //удаляем строку из таблицы
			 $sql = mysqli_query($link, "DELETE FROM `Транспорт` WHERE `ID машины` = {$_GET['del_id']}");
			 if ($sql) {
			   echo "<p>Товар удален.</p>";
			 } else {
			   echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
			 }
		   }
	 
	
	?>
	
</table>  <div class="knopki">
	<button> <a href="updateauto.php">Редактировать</a><br> </button>
	<button> <a href="adminauto.php">Обновить</a><br> </button>
	<button><a href="insertAuto.php">Добавить</a><br> </button>
	<button><a href="../adminindex.php">На главную</a><br> </button>
		</div>
</div>