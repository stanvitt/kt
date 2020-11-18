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
	echo "<link rel='stylesheet' href='../style/styletableadminzakaz.css'>";	
?>
<div class='all'>
<table border = "1" style ="font-size:25px">
<caption> Заказ </caption>
	<tr>
		<th >Код заказа</th>
		<th>Отправитель</th>
		<th>Получатель</th>
		<th>Дата заказа</th>
        <th>Дата доставки</th>
                <th>Цена доставки</th>
                <th>Транспорт</th>
                <th>Тип доставки</th>                
	</tr>
	</div>
	<?php
		 $sql = mysqli_query($link, 'SELECT `Код заказа`, `Отправитель`,`Получатель`,`Дата заказа`,`Дата доставки`,`Цена доставки`,
		 `Транспорт`,`ID доставки` FROM `Заказ`');
		 while ($result = mysqli_fetch_array($sql)) {
		   echo '<tr>' .
				"<td>{$result['Код заказа']}</td>" .
				"<td>{$result['Отправитель']}</td>" .
				"<td>{$result['Получатель']}</td>" .
				"<td>{$result['Дата заказа']}</td>" .
				"<td>{$result['Дата доставки']}</td>" .
				"<td>{$result['Цена доставки']}</td>" .
				"<td>{$result['Транспорт']}</td>" .
				"<td>{$result['ID доставки']}</td>" .
				"<td><a href='?del_id={$result['Код заказа']}'>Удалить</a></td>" .
				'</tr>';
		 }
		 if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
			 //удаляем строку из таблицы
			 $sql = mysqli_query($link, "DELETE FROM `Заказ` WHERE `Код заказа` = {$_GET['del_id']}");
			 if ($sql) {
			   echo "<p>Запись удалена.</p>";
			 } else {
			   echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
			 }
		   }
	?>
	
</table> 
	<div class ="knopki">

	<button>	<a href="updatezakaz.php">Редактировать</a> </button>
	<button>	<a href="adminzakaz.php">Обновить</a> </button>
	<button>	<a href="insertZakaz.php">Добавить</a> </button>
	<button>	<a href="../adminindex.php">На главную</a> </button>
	<form class="b3" action="excel.php" method="post">
<button type="submit" name="export_excel" class ="knopka" >Excel отчет</button>
</form>
	</div>
</div>