<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main</title>
</head>
<body>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<div class="container">
<form action="" method="post">
    <p>
        <label>фамилия<br></label>
        <input class="form-control" name="LastName" type="text" size="15" maxlength="15">
    </p>
    <p>
        <label>Имя<br></label>
        <input class="form-control" name="FirstName" type="text" size="64" maxlength="64">
    </p>
    <p>
        <label>Отчество<br></label>
        <input class="form-control" name="MidName" type="text" size="64" maxlength="64">
    </p>
    <p>
        <label>дата рождения<br></label>
        <input class="form-control" name="BirthDate" type="date">
    </p>
    <p>
        <label>класс<br></label>
        <select class="form-control" name="class" id="select">
 

        </select>
    </p>
    <p>
        <input type="submit" class="btn btn-primary" name="submit" value="Добавить">
    </p>
</form>
<div class="row">
    <div class="col">
    <form method="post">
    <p>
    <input type="submit" class="btn btn-primary" name="small" value="Показать самого младшего">
    </p>
    <p>
    <input type="submit" class="btn btn-primary" name="count" value="Подсчитать количество учеников ">
    </p>
    <p>
    <input type="submit" class="btn btn-primary" name="bdate" value="Вывести список именинников в июле">
    </p>
    </form>
    </div>
    <div class="col data">

    </div>
</div>

<form action="" method="post">
<select class="form-control" name="select2" id="select2"></select>

<input type="button" class="btn btn-primary" name="submit" id="submit12" value="submit" >
</form>
<br>
<div class="table"></div>
</div>

<?php


    require_once 'bd.php';
    require_once 'select.php';
    require_once 'report.php';


    if (isset($_POST["LastName"]) && isset($_POST["FirstName"]) && isset($_POST["MidName"]) && isset($_POST["BirthDate"]) && isset($_POST["class"])) {

        $Lname = htmlspecialchars($_POST["LastName"]);
        $Fname = htmlspecialchars($_POST["FirstName"]);
        $Mname = htmlspecialchars($_POST["MidName"]);
        $Bdate = htmlspecialchars($_POST["BirthDate"]);
        $errors = array();
        if ( trim($_POST["LastName"]) == '' ){
			$errors[] = 'Введите фамилию';
        }
        if ( trim($_POST["FirstName"]) == '' ){
			$errors[] = 'Введите имя';
        }
        if ( trim($_POST["MidName"]) == '' ){
			$errors[] = 'Введите отчество';
        }
        if ( trim($_POST["BirthDate"]) == '' ){
			$errors[] = 'Введите дату рождения';
        }
        if ( trim($_POST["class"]) == '' ){
			$errors[] = 'Выберите класс';
		}

        if(empty($errors)){
            $sel = "SELECT * FROM students WHERE SLastName = '$Lname'";
            $res = mysqli_query($link, $sel); 
            $num = mysqli_num_rows($res);
            
            if($num == 0) {
            
                $sel = "SELECT * FROM students WHERE SBirthDate = '$Bdate'";
                $res = mysqli_query($link, $sel); 
                $num = mysqli_num_rows($res);
    
                if($num == 0){
                    $sql = mysqli_query($link, "INSERT INTO `students` (`SLastName`, `SFirstName`, `SMidName`, `SBirthDate`, Cid) VALUES ('{$Lname}', '{$Fname}', '{$Mname}', '{$_POST['BirthDate']}', '{$_POST['class']}')");
                    //Если вставка прошла успешно
                    if ($sql){
                      echo '<p>Успешно!</p>';
                    } 
                    else{
                      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
                    }
                }
                else{
                    $sql = mysqli_query($link, "INSERT INTO `students` (`SLastName`, `SFirstName`, `SMidName`, `SBirthDate`, Cid) VALUES ('{$Lname}', '{$Fname}', '{$Mname}', '{$_POST['BirthDate']}', '{$_POST['class']}')");
                    //Если вставка прошла успешно
                    if ($sql){
                      echo '<p>Успешно!</p>';
                    } 
                    else{
                      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
                    }
                }
                
            
            }else { 
                $sel = "SELECT * FROM students WHERE SBirthDate = '$Bdate'";
                $res = mysqli_query($link, $sel); 
                $num = mysqli_num_rows($res);
    
                if($num == 0) {
                    $sql = mysqli_query($link, "INSERT INTO `students` (`SLastName`, `SFirstName`, `SMidName`, `SBirthDate`, Cid) VALUES ('{$Lname}', '{$Fname}', '{$Mname}', '{$_POST['BirthDate']}', '{$_POST['class']}')");
                    //Если вставка прошла успешно
                    if ($sql) {
                      echo '<p>Успешно!</p>';
                    } else {
                      echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
                    }
                }else{
                    echo "Пользователь с таким именем существует! "; 
                }
             }
        }
    }
  ?>



<script>
$( document ).ready(function(){
    $( "#submit12" ).click(function() {
    var count = $('#select2').val();
    $.ajax({
        type: "POST",
        url: "show.php",
        data: {count:count}
    }).done(function( result )
        {
            $(".table").append(result);
        });
})

})

</script>
</body>
</html>