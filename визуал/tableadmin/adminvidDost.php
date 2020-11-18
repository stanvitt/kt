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
	echo "<link rel='stylesheet' href='../style/styletableadminvidD.css '>";
?>
<div class='all'>
<table border = "1" style ="font-size:25px">
<caption>Вид доставки </caption>
	<tr>
		<th >ID доставки</th>
		<th>Тип доставки</th>		                                   			                 
	</tr>
	</div>
	<?php
		 $sql = mysqli_query($link, 'SELECT `ID доставки`, `Тип доставки` FROM `вид доставки`');
		 while ($result = mysqli_fetch_array($sql)) {
		   echo '<tr>' .
				"<td>{$result['ID доставки']}</td>" .
				"<td>{$result['Тип доставки']}</td>" .
			
	
				"<td><a href='?del_id={$result['ID доставки']}'>Удалить</a></td>" .
				'</tr>';
		 }
		 if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
			 //удаляем строку из таблицы
			 $sql = mysqli_query($link, "DELETE FROM `Вид доставки` WHERE `ID доставки` = {$_GET['del_id']}");
			 if ($sql) {
			   echo "<p>Товар удален.</p>";
			 } else {
			   echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
			 }
		   }
	 
	
	?>
	

</table>  
<div class = "knopki">
<button>	<a href="updatevidD.php">Редактировать</a><br> </button>
<button>	<a href="adminvidDost.php">Обновить</a><br> </button>
<button>	<a href="insertvidD.php">Добавить</a><br> </button>
<button>	<a href="../adminindex.php">На главную</a><br> </button>
</div>
</div>