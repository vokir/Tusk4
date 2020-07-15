<?php
require_once 'bd.php';
if (isset($_POST['count']))
    {
        $count = "SELECT * FROM students WHERE (Cid > 4 AND Cid < 9)" ;
        $res = mysqli_query($link, $count); 
        $num = "<p>Кол-во учеников во 2-ом классе -  ".mysqli_num_rows($res)."</p>";
        

        echo ("<script>$('.data').html('$num')</script>"); 
    }
    if (isset($_POST['bdate']))
    {
        $count = "SELECT * FROM students WHERE SBirthDate Between '2000-07-01' AND '2000-07-31' AND (Cid >= 1 AND Cid < 5)" ;
        $result = mysqli_query($link, $count) or die("Ошибка " . mysqli_error($link)); 
        if($result)
        {
    
            while ($row = mysqli_fetch_row($result)) {
              
                $out1.= "<p>$row[0] $row[1] $row[2] $row[3] $row[4]</p>" ;
            }
    
            echo ("<script>$('.data').html('$out1')</script>"); 
            
    
            mysqli_free_result($result);
        }
    }
    if (isset($_POST['small']))
    {
        $count = "SELECT SLastName, SFirstName, SMidName, MIN(SBirthDate), Cid FROM students";
        $result = mysqli_query($link, $count) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {

        while ($row = mysqli_fetch_row($result)) {
          
            $out1.= "<p>$row[4] $row[0] $row[1] $row[2] $row[3]</p>" ;
            
        }

        echo ("<script>$('.data').html('$out1')</script>"); 
        

        mysqli_free_result($result);
     }
    }

?>