<?php
$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "Mo2men@#";
$DATABASE = "job_portal";

$connection = new mysqli($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
if($connection->connect_errno){
    die("----------Failed to connect this database----------");
}
?>