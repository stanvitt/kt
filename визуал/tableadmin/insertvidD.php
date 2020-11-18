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
  <form class="content" action="" method="post">
    <h2> Добавить запись</h2>
  <table>
    <tr>
      <td>ID доставки:</td>
      <td><input type="text" name="ID"></td>
    </tr>
    <tr>
      <td>Тип доставки:</td>
      <td><input type="text" name="vid" > </td>
    </tr>
  </table>
  <br>
  <input type="submit" value="Добавить">
 <button> <a href="adminvidDost.php">К таблице</a> </button>
</form>
<?php

  //Если значения всех полей переданы
  if (isset ($_POST["ID"]) && ($_POST["vid"])   )  {
    //Вставляем данные, подставляя их в запрос
    $sql = mysqli_query($link, "INSERT INTO `Вид доставки` (`ID доставки`, `Тип доставки`) VALUES 
    ('{$_POST['ID']}', '{$_POST['vid']}' )") ;
        
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