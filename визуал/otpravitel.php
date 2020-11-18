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
	echo "<link rel='stylesheet' href='style/styletableadminoptravitel.css'>";
?>
<div class='all'>
<table border = "1" style ="font-size:25px">
<caption> Отправитель</caption>
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
		$query = "SELECT * FROM `Отправитель`";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		
		$result = '';
		foreach ($data as $elem) {
			$result .= '<tr>';
			
			$result .= '<td>' . $elem['id отправителя'] . '</td>';
			$result .= '<td>' . $elem['Фамилия'] . '</td>';
			$result .= '<td>' . $elem['Имя'] . '</td>';
			$result .= '<td>' . $elem['Отчество'] . '</td>';
                        $result .= '<td>' . $elem['Индекс'] . '</td>';
                        $result .= '<td>' . $elem['Город'] . '</td>';
                        $result .= '<td>' . $elem['Улица'] . '</td>';
                        $result .= '<td>' . $elem['Дом'] . '</td>';
                        $result .= '<td>' . $elem['Квартира'] . '</td>';
                        $result .= '<td>' . $elem['Телефон'] . '</td>';
					

			
			$result .= '</tr>';
		}
		
		echo $result;
	?>
	
</table> 
<button>  <a href="index.php">На главную</a> </button> 
</div>