<?php
session_start();
$connection = new mysqli("localhost", "root", "123y", "job_portal");
if ($connection->connect_errno) {
    die("error in database connection");
}



print_r($_SESSION);
echo"<BR><BR><BR>";
var_dump($_SESSION) ;