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
	echo "<link rel='stylesheet' href='../style/styletableadminoptravitel.css'>";
?>
<div class='all'>
<table border = "1" style ="font-size:25px">
<caption> Отправитель </caption>
	<tr>
		<th >ID отправителя</th>
		<th>Фамилия</th>
		<th>Имя</th>
		<th>Отчество</th>
                <th>Индекс</th>
                <th>Город</th>
                <th>Улица</th>
                <th>Дом</th>
                <th>Квартира</th>
                <th>Телефон</th>
			
                 
	</tr>
	</div>
	<?php
	 $sql = mysqli_query($link, 'SELECT `ID отправителя`, `Фамилия`,`Имя`,`Отчество`,`Индекс`,`Город`,`Улица`,`Дом`,`Квартира`,`Телефон` FROM `Отправитель`');
	 while ($result = mysqli_fetch_array($sql)) {
	   echo '<tr>' .
			"<td>{$result['ID отправителя']}</td>" .
			"<td>{$result['Фамилия']}</td>" .
			"<td>{$result['Имя']}</td>" .
			"<td>{$result['Отчество']}</td>" .
			"<td>{$result['Индекс']}</td>" .
			"<td>{$result['Город']}</td>" .
			"<td>{$result['Улица']}</td>" .
			"<td>{$result['Дом']}</td>" .
			"<td>{$result['Квартира']}</td>" .
			"<td>{$result['Телефон']}</td>" .
			"<td><a href='?del_id={$result['ID отправителя']}'>Удалить</a></td>" .
			'</tr>';
	 }
	 if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
		 //удаляем строку из таблицы
		 $sql = mysqli_query($link, "DELETE FROM `Отправитель` WHERE `ID отправителя` = {$_GET['del_id']}");
		 if ($sql) {
		   echo "<p>Запись удалена.</p>";
		 } else {
		   echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
		 }
	   }
 

  
	?>
	
</table> 
 	<div class ="knopki">
<button>	<a href ="updateoptr.php">Редактировать</a> </button>
<button>	<a href ="adminotpravitel.php">Обновить</a> </button>
<button>	<a href ="insertOtpr.php">Добавить</a> </button>
<button>	<a href="../adminindex.php">На главную</a> </button>
	</div>
</div>