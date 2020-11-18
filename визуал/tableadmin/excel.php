<?php

			$host = 'localhost';
            $user = 'root'; 
            $password = ''; 
            $db_name = 'служба доставки грузов 2'; 
            $link = mysqli_connect($host, $user, $password, $db_name);
            
            $output = '';
            if(isset ($_POST["export_excel"])){
                $sql = "SELECT * From `Заказ`";
                $result = mysqli_query($link, $sql);
                if(mysqli_num_rows($result) > 0){
                    $output .= '
                        <table class="table" bordered="1">
                            <tr>
                                <th>Код заказа</th>
                                <th>Отправитель</th>
                                <th>Получатель</th>
                                <th>Дата заказа</th>
                                <th>Дата доставки</th>
                                <th>Цена доставки</th>
                                <th>Транспорт</th>
                                <th>Тип доставки</th>
                            </tr>
                    ';
                    while($row = mysqli_fetch_array($result)){
                        $output .= '
                            <tr>
                                <td>'.$row['Код заказа'].'</td>
                                <td>'.$row['Отправитель'].'</td>
                                <td>'.$row['Получатель'].'</td>
                                <td>'.$row['Дата заказа'].'</td>
                                <td>'.$row['Дата доставки'].'</td>
                                <td>'.$row['Цена доставки'].'</td>
                                <td>'.$row['Транспорт'].'</td>
                                <td>'.$row['ID доставки'].'</td>
                            </tr>
                        ';
                    }
                    $output .= '</table>';
                    header("Content-type: application/xls");
                    header("Content-disposition: attachment; filename=OtchetZakaz.xls"  );
                    echo $output;
                  
                }
            }
            mysqli_query($link,"SET NAMES 'cp1251'");
            
            
?>

