<?php


require("./inc/connection.php");

if($_POST['gender']=="male"){$_POST['gender']="m";}
else if($_POST['gender']=="female"){$_POST['gender']="f";};

$connection->query("insert into applicant (fname, lname, user_name, date_of_birth, gender, email, password, country)
    values ('{$_POST['firstname']}',
            '{$_POST['lastname']}',
            '{$_POST['username']}',
            '{$_POST['date']}',
            '{$_POST['gender']}',
            '{$_POST['email']}',
            '{$_POST['password']}',
            '{$_POST['country']}')
        ");

$connection->close();

// $new_date = date('y-m-d', strtotime($_POST['date']));

header("Location:table.php")

?>

var_dump($_POST);
