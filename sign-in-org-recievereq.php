<?php
session_start();
require_once "./inc/connection.php";
require_once "./inc/function.inc.php";

var_dump($_REQUEST);
echo "<br>";
$g_email = $_REQUEST['email'];
$g_password = $_REQUEST['password'];
var_dump($g_email);
echo "<br>";
var_dump($g_password);
echo "<br>";
$data = $connection->query("SELECT * FROM organization where email='$g_email'");
$result = $data->fetch_assoc();
echo "<br><br><Br>";
echo "<pre>";
var_dump($result);
echo "</pre>";
var_dump("$result[id_org]");
//check password 
//check password 
if ($g_password == $result['password']) {
    // session start
    $_SESSION["id_org"] = "$result[id_org]";
    $_SESSION["org_name"] = "$result[org_name]";
    $_SESSION["date_of_est"] = "$result[date_of_est]";
    $_SESSION["email"] = "$result[email]";
    $_SESSION["password"] = "$result[password]";
    $_SESSION["org_description"] = "$result[org_description]";
    $_SESSION["location"] = "$result[location]";
    $_SESSION["org_pic"] = "$result[org_pic]";
    $_SESSION["jobs"] = jobs($connection, $_SESSION["id_org"]);
    // session end
    //relocation start 
    header("location:profileorg.php?email=$g_email");
} else {
    header("location:sign-in-org-sendreq.php?email=$g_email&error=1");
}
$connection->close();
