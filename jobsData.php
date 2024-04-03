<?php
require_once("./inc/connection.php");


global $connection;
$searchQuery = '';
// $jobsData[]='';

session_start();

if ($_SESSION["email"]) {
    $jobsData = $connection->query("select jobs.*,category.category,organization.* from
    jobs inner join category on jobs.id_category= category.id_category
     inner join organization on organization.id_org=jobs.org_id;");
    if (isset($_POST["Search"]) &&  $_POST["Search"] != '') {

        $searchQuery = $_POST["Search"];
        $jobsData = $connection->query("select jobs.*,category.category,organization.* from
           jobs inner join category on jobs.id_category= category.id_category
            inner join organization on organization.id_org=jobs.org_id 
            where job_title LIKE '%$searchQuery%' and job_status='o'
            ;");
    }
    // Include the view file
    include("available-jobs.php");
} else {
    header("location:choose-start.html");
}
