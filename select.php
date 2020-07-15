<?php
require_once 'bd.php';
     


    $query ="SELECT * FROM classes";

    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {

        while ($row = mysqli_fetch_row($result)) {
            $out .= "<option value=$row[0]>$row[0]</option>";
        }

        echo ("<script>$('#select').append('$out')
        $('#select2').append('$out')</script>");
        

        mysqli_free_result($result);
    }
?>