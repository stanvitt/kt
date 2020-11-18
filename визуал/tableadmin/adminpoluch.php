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
	echo "<link rel='stylesheet' href='../style/styletableadminpoluch.css'>";
?>
<div class='all'>
<table border = "1" style ="font-size:25px">
<caption> Получатель </caption>
	<tr>
		<th >ID отправителя</th>
		<th>Фамилия</th>
		<th>Имя</th>
		<th>Отчество</th>
        <th>Телефон</th>
                <th>Индекс</th>
                <th>Город</th>
                <th>Улица</th>
                <th>Дом</th>
                <th>Квартира</th>
            
			
                 
	</tr>
	</div>
	<?php
	   $sql = mysqli_query($link, 'SELECT `ID получателя`, `Фамилия`,`Имя`,`Отчество`,`Телефон`,`Индекс`,`Город`,`Улица`,`Дом`,`Квартира` FROM `Получатель`');
	   while ($result = mysqli_fetch_array($sql)) {
		 echo '<tr>' .
			  "<td>{$result['ID получателя']}</td>" .
			  "<td>{$result['Фамилия']}</td>" .
			  "<td>{$result['Имя']}</td>" .
			  "<td>{$result['Отчество']}</td>" .
			  "<td>{$result['Телефон']}</td>" .
			  "<td>{$result['Индекс']}</td>" .
			  "<td>{$result['Город']}</td>" .
			  "<td>{$result['Улица']}</td>" .
			  "<td>{$result['Дом']}</td>" .
			  "<td>{$result['Квартира']}</td>" .
			  "<td><a href='?del_id={$result['ID получателя']}'>Удалить</a></td>" .
			  '</tr>';
	   }
	   if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
		   //удаляем строку из таблицы
		   $sql = mysqli_query($link, "DELETE FROM `Получатель` WHERE `ID получателя` = {$_GET['del_id']}");
		   if ($sql) {
			 echo "<p>Запись удалена.</p>";
		   } else {
			 echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
		   }
		 }
   

	
	?>
	
</table> 
<div class = "knopki">
	<button>	<a href="updatepoluch.php">Редактировать</a><br> </button>
	<button>	<a href="adminpoluch.php">Обновить</a><br> </button>
	<button>	<a href="insertPoluch.php">Добавить</a><br> </button>
	<button>	<a href="../adminindex.php">На главную</a><br> </button>
	
	</div>
</div>