<?php
session_start();
$connection = new mysqli("localhost", "root", "123y", "job_portal");
if ($connection->connect_errno) {
    die("error in database connection");
}
////////////////////////////////////////////////////////////////////////////////////////////
var_dump($_REQUEST);
echo "<br>";
$job_title = $_REQUEST['job_title'];
$job_description = $_REQUEST['job_description'];
$salary = $_REQUEST['salary'];
$category = $_REQUEST['category'];
$expire_date = $_REQUEST['expire_date'];
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
//////////////////////////////////////////////////////////////////////////////////
$data1 = $connection->query("
INSERT INTO jobs (job_title ,job_description,org_id,publish_date,expire_date,job_status)
VALUES ('$job_title','$job_description',1,CURDATE(),'$expire_date','o')
");

// $data->fetch_assoc();
$connection->close();
