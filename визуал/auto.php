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
	echo "<link rel='stylesheet' href='style/styletableadminauto.css'>";
?>
<div class='all'>
<table border = "1" style ="font-size:25px">
<caption> Транспорт </caption>
	<tr>
		<th >ID машины</th>
		<th>Марка</th>
		<th>Цвет</th>
		<th>Номер машины</th>
      
               
               
			
                 
	</tr>
	</div>
	<?php
		$query = "SELECT * FROM `Транспорт`";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		
		$result = '';
		foreach ($data as $elem) {
			$result .= '<tr>';
			
			$result .= '<td>' . $elem['ID машины'] . '</td>';
			$result .= '<td>' . $elem['Марка'] . '</td>';
			$result .= '<td>' . $elem['Цвет'] . '</td>';
			$result .= '<td>' . $elem['Номер машины'] . '</td>';
                     

			
			$result .= '</tr>';
		}
		
		echo $result;
	?>
	
</table> 
<button>  <a href="index.php">На главную</a> </button> 
</div>