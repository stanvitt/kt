<!doctype html>
<html lang="ru">
<body>
  <?php
    $host = 'localhost';  // Хост, у нас все локально
    $user = 'root';    // Имя созданного вами пользователя
    $pass = ''; // Установленный вами пароль пользователю
    $db_name = 'Служба доставки грузов 2';   // Имя базы данных
    $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

    // Ругаемся, если соединение установить не удалось
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }

    echo "<link rel='stylesheet' href='../style/styleupd.css '>";
?>
<form class ="content" action="" method="post">
  
    <h1>Редактировать данные</h1>
 
  <input placeholder="ID машины" type="text" name="ID" size = "15"   > 
  <input placeholder="Марка" type="text" name="Marka" size = "15" > 
 <input  placeholder="Цвет" type="text" name="Color" size = "15"  > 
 <input placeholder="Номер машины" type="text" name="NumM" size = "15"  >

<input type="submit" value="Редактировать" class= "button">

<button>  <a href="adminauto.php">К таблице</a> </button>
      <button> <a href="../adminindex.php">На главную</a> </button>
</form>
</section>


<?php

if(isset($_POST['ID']) && isset($_POST['Marka'])){
 
  $ID = htmlentities(mysqli_real_escape_string($link, $_POST['ID']));
  $marka = htmlentities(mysqli_real_escape_string($link, $_POST['Marka']));
  $color = htmlentities(mysqli_real_escape_string($link, $_POST['Color']));
  $numM = htmlentities(mysqli_real_escape_string($link, $_POST['NumM']));
  


  
   
  $query ="UPDATE `Транспорт` SET `ID машины` ='$ID', `Марка`='$marka',`Цвет`='$color',`Номер машины`='$numM'
   WHERE `ID машины`='$ID'";
  $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

  if($result)
      echo "<span style='color:blue;'>Данные обновлены</span>";
}
?>
</body>
</html>