<?php
session_start();
require("inc/connection.php");

var_dump($_REQUEST);
echo "<br>";
$g_email = $_REQUEST['email'];
$g_password = $_REQUEST['password'];

var_dump($g_email);
echo "<br>";
var_dump($g_password);
echo "<br>";

$data = $connection->query("SELECT * FROM applicant where email='$g_email'");

$result = $data->fetch_assoc();
var_dump($data->fetch_assoc());
var_dump($result);
$_SESSION["id_app"];
$_SESSION["fname"];
$_SESSION["lname"];
$_SESSION["date_of_birth"];
$_SESSION["appemail"];
$_SESSION["apppassword"];
$_SESSION["gender"];
$_SESSION["user_name"];
$_SESSION["country"];
$_SESSION["app_pic"];

if ($g_password == $result['password']) {

    // session start
    $_SESSION["id_app"] = "$result[id_app]";
    $_SESSION["fname"] = "$result[fname]";
    $_SESSION["lname"] = "$result[lname]";
    $_SESSION["date_of_birth"] = "$result[date_of_birth]";
    $_SESSION["appemail"] = "$result[email]";
    $_SESSION["apppassword"] = "$result[password]";
    $_SESSION["gender"] = "$result[gender]";
    $_SESSION["user_name"] = "$result[user_name]";
    $_SESSION["country"] = "$result[country]";
    $_SESSION["app_pic"] = "$result[app_pic]";


    // var_dump($_SESSION["id_org"]);
    // session end
    //relocation
    // var_dump($result);


    header("location:applicantProfile.php?email=$g_email");
} else {
    header("location:sign-in-reqapp.php?email=$g_email&error=1");
}

$connection->close();
