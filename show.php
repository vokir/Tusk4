<?php
    require_once 'bd.php';



    $count = $_POST['count'];

    $sql = "SELECT * FROM students WHERE Cid = $count";
    $result = mysqli_query($link, $sql);
    $out = "<table width=100%>";
    $out .="<tr><td>id</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Дата рождения</td><td>класс</td><td>#</td></tr>";
    while ($row = mysqli_fetch_array($result)){
        $pole1=$row[0];
        $pole2=$row[1];
        $pole3=$row[2];
        $pole4=$row[3];
        $pole5=$row[4];
        $pole6=$row[5];
        $out .="<tr><td>$pole1</td><td>$pole2</td><td>$pole3</td><td>$pole4</td><td>$pole5</td><td>$pole6</td><td><a href=delete.php?id=$pole1  >Удалить</a></td</tr>";
    }
    
    $out .="</table>";
     echo ("<script>$('.table').html('$out')</script>"); 
?>