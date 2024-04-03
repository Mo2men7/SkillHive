<?php
require("inc/connection.php");

// var_dump($_REQUEST);
// echo "<br>";
$g_email = $_REQUEST['email'];
$g_password = $_REQUEST['password'];

// var_dump($g_email);
// echo "<br>";
// var_dump($g_password);
// echo "<br>";

$data = $connection->query("SELECT * FROM applicant where email='$g_email'");

// $result = $data->fetch_assoc();
// var_dump($data->fetch_assoc());
// var_dump($result);
// $_SESSION["id_app"];
// $_SESSION["fname"];
// $_SESSION["lname"];
// $_SESSION["date_of_birth"];
// $_SESSION["appemail"];
// $_SESSION["apppassword"];
// $_SESSION["gender"];
// $_SESSION["user_name"];
// $_SESSION["country"];
// $_SESSION["app_pic"];
if ($result = $data->fetch_assoc()) {
if ($g_password == $result['password']) {

    session_start();
    $_SESSION["id_app"] = $result["id_app"];
    $_SESSION["fname"] = $result["fname"];
    $_SESSION["lname"] = $result["lname"];
    $_SESSION["user_name"] = $result["user_name"];
    $_SESSION["date_of_birth"] = $result["date_of_birth"];
    $_SESSION["gender"] = $result["gender"];
    $_SESSION["email"] = $result["email"];
    $_SESSION["password"] = $result["password"];
    $_SESSION["country"] = $result["country"];
    $_SESSION["app_pic"] = $result["app_pic"];
    $_SESSION["address"] = $result["address"];
    $_SESSION["job_title"] = $result["job_title"];
    $_SESSION["phone"] = $result["phone"];
    header("location:applicantProfile.php");
}

else 
{
    // error 1 => password
header("location:sign-in-sendreqapp.php?email=$g_email&error=1");
exit();
}
}
else
{
// error 2 => email
header("location:sign-in-sendreqapp.php?email=$g_email&error=2");
exit();
}
    // var_dump($_SESSION["id_org"]);
    // session end
    //relocation
    // var_dump($result);

    $connection->close();