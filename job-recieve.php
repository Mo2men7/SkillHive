<?php
session_start();
require_once "./inc/connection.php";
////////////////////////////////////////////////////////////////////////////////////////////
// var_dump($_SESSION);
// echo""
var_dump($_REQUEST);

echo "<br>";
$job_title = $_REQUEST['job_title'];
$job_description = $_REQUEST['job_description'];
$salary = $_REQUEST['salary'];
$category = $_REQUEST['category'];
$expire_date = $_REQUEST['expire_date'];
$salary = $_REQUEST['salary'];
$id_org=$_SESSION['id_org'];
$id_category=$_REQUEST['category'];;
echo "<br>";
var_dump($job_title);
echo "<br>";
var_dump($job_description);
echo "<br>";
var_dump($salary);
echo "<br>";
var_dump($category);
echo "<br>";
var_dump($expire_date);
echo "<br>";
var_dump($id_org);
echo "<br>";
var_dump($id_category);
////////////////////////////////////////////////////////////////////////////////////
$data1 = $connection->query("
INSERT INTO jobs (job_title ,job_description,org_id,publish_date,expire_date,job_status,salary,id_category)
VALUES ('$job_title','$job_description','$id_org',CURDATE(),'$expire_date','o','$salary','$id_category')
");
header("Location: jobs.php");
// $data->fetch_assoc();
$connection->close();
