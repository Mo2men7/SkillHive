<?php
$connection = new mysqli("localhost", "root", "Mo2men@#", "job_portal");
if($connection->connect_errno){
    die("----------Failed to connect this database----------");
}
?>