<!DOCTYPE html>
<html>
    <head>
        <title>Вы уверены?</title>
        <meta charset="utf-8">
    </head>
    <body>
        <div class="sure">
        <p>Вы уверены?</p>
        <form action="" method="post">
        <input type="submit" name="confirm" value="Yes">
        <input type="submit" name="confirm" value="No">
        </div>

    </body>
</html>

<?php
    require_once 'bd.php';


    $del = $_GET['id'];

    if(isset($_POST['confirm']) == 'yes'){
        $sql = "DELETE FROM `students` WHERE `students`.`SId` = '$del'";

        if (mysqli_query($link, $sql)) {
            echo "запись удалена"."<br><a href=index.php>Вернуться назад</a>";
            
        } else {
        echo "Ошибка удаления записи: " . mysqli_error($link);
        }

        exit;
    }else{
        echo "<a href=index.php>Назад</a>";
    }

?>