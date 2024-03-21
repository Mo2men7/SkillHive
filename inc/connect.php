<?php
$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="job_portal";
$connect = new pdo("mysql:host=$servername;dbname=$dbname", "$dbusername", "$dbpassword");
if (!$connect)
{
    die("connection failed: ".mysqli_connect_error());
}
