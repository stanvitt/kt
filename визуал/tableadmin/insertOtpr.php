<!doctype html>
<html lang="ru">
<head>
  <title>Админ-панель</title>
</head>
<body>
  <?php
    $host = 'localhost';  // Хост, у нас все локально
    $user = 'root';    // Имя созданного вами пользователя
    $pass = ''; // Установленный вами пароль пользователю
    $db_name = 'служба доставки грузов 2';   // Имя базы данных
    $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

    // Ругаемся, если соединение установить не удалось
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }

    echo "<link rel='stylesheet' href='../style/styleinsert.css '>";
?>
<h2 style="text-align:center; "> Добавить запись </h2>
  <form class ="content" action="" method="post">

  <table>
    <tr>
      <td>ID отправителя:</td>
      <td><input type="text" name="ID"></td>
    </tr>
    <tr>
      <td>Фамилия:</td>
      <td><input type="text" name="Fam" > </td>
    </tr>
    <tr>
      <td>Имя:</td>
      <td><input type="text" name="Name"></td>
    </tr>
    <tr>
      <td>Отчество:</td>
      <td><input type="text" name="Otch"></td>
    </tr>
  
    <tr>
      <td>Индекс:</td>
      <td><input type="text" name="Ind" > </td>
    </tr>
    <tr>
      <td>Город:</td>
      <td><input type="text" name="City"></td>
    </tr>
    <tr>
      <td>Улица:</td>
      <td><input type="text" name="Street" > </td>
    </tr>
    <tr>
      <td>Дом:</td>
      <td><input type="text" name="Home"></td>
    </tr>
    <tr>
      <td>Квартира:</td>
      <td><input type="text" name="Cvart" > </td>
    </tr>
    <tr>
      <td>Телефон:</td>
      <td><input type="text" name="Num"></td>
    </tr>
  
  </table>
  <input type="submit" value="Добавить">
 <button> <a href="adminotpravitel.php">К таблице</a> </button>
</form>
<?php

  //Если значения всех полей переданы
  if (isset ($_POST["ID"]) && ($_POST["Fam"]) && ($_POST["Name"]) && ($_POST["Otch"])  && ($_POST["Ind"]) && ($_POST["City"])
  && ($_POST["Street"]) && ($_POST["Home"]) && ($_POST["Cvart"]) && ($_POST["Num"])  )  {
    //Вставляем данные, подставляя их в запрос
    $sql = mysqli_query($link, "INSERT INTO `Отправитель` (`id отправителя`, `Фамилия`, `Имя`,`Отчество`,
        `Индекс`,`Город`,`Улица`,`Дом`,`Квартира`,`Телефон`) VALUES ('{$_POST['ID']}', '{$_POST['Fam']}','{$_POST['Name']}','{$_POST['Otch']}',
        '{$_POST['Ind']}','{$_POST['City']}','{$_POST['Street']}','{$_POST['Home']}','{$_POST['Cvart']}','{$_POST['Num']}')") ;
        
    //Если вставка прошла успешно
    if ($sql) 
    {
      echo '<p>Данные успешно добавлены в таблицу.</p>';
    } 
    else 
    {
      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
    }
}
?>
 
 
</body>
</html>