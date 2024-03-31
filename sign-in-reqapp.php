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

if ($g_password == $result['password']) {


    header("location:profile.php?email=$g_email");
} else {
    header("location:sign-in-sendreq.php?email=$g_email&error=1");
}

$connection->close();
