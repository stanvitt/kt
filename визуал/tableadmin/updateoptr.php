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
  
     
      <input placeholder="ID отправителя" type="text" name="ID"   >  

      <input  placeholder="Фамилия" type="text" name="Fum"  > 

      <input placeholder="Имя" type="text" name="Name"   > 

      <input  placeholder="Отчество" type="text" name="Otch"  >

      <input  placeholder="Индекс" type="text" name="Ind"   >   

      <input placeholder="Город" type="text" name="City"  >  
   
     <input placeholder="Улица" type="text" name="Street" > 
    

      <input placeholder="Дом" type="text" name="Home"  >    

      <input placeholder="Квартира" type="text" name="Cvart"  >  

      <input placeholder="Телефон" type="text" name="Num"    >  
     
      <input type="submit" value="Редактировать" class= "button">

      <button> <a href="adminotpravitel.php">К таблице</a>   </button>
      <button> <a href="../adminindex.php">На главную</a>    </button>
</form>
</section>


<?php

if(isset($_POST['ID']) && isset($_POST['Fum'])){
 
  $ID = htmlentities(mysqli_real_escape_string($link, $_POST['ID']));
  $fum = htmlentities(mysqli_real_escape_string($link, $_POST['Fum']));
  $name = htmlentities(mysqli_real_escape_string($link, $_POST['Name']));
  $otch = htmlentities(mysqli_real_escape_string($link, $_POST['Otch']));
  $ind = htmlentities(mysqli_real_escape_string($link, $_POST['Ind']));
  $city = htmlentities(mysqli_real_escape_string($link, $_POST['City']));
  $street = htmlentities(mysqli_real_escape_string($link, $_POST['Street']));
  $home = htmlentities(mysqli_real_escape_string($link, $_POST['Home']));
  $cvart = htmlentities(mysqli_real_escape_string($link, $_POST['Cvart']));
  $num = htmlentities(mysqli_real_escape_string($link, $_POST['Num']));
  
   
  $query ="UPDATE `Отправитель` SET `ID отправителя` ='$ID', `Фамилия`='$fum',`Имя`='$name',`Отчество`='$otch',`Индекс`='$ind',`Город`='$city',
  `Улица`='$street',`Дом`='$home',`Квартира`='$cvart',`Телефон`='$num' WHERE `ID отправителя`='$ID'";
  $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

  if($result)
      echo "<span style='color:blue;'>Данные обновлены</span>";
}
?>
</body>
</html>