<?php
session_start();
require_once "connection.php";

echo "<pre>";
// print_r($_GET["id"]);
print_r($_POST);
echo "</pre>";
//     UPDATE table_name
// SET column1=value, column2=value2,...
// WHERE some_column=some_value 
// [id_job] => 1
//     [job_title] => Data Analyst
//     [job_description] => Seeking a skilled data analyst to analyze large datasets and provide insights for decision-making.
//     [expire_date] => 2024-04-10
//     [id_category] => 5
//     [job_status] => o
//     [edit] => Edit
$stm = $connection->prepare("UPDATE jobs SET job_title=?,job_description=?,expire_date=?,id_category=?,job_status=?,salary=? where id_job=?");

$stm-> bind_param('sssisii',
    $_POST["job_title"],
    $_POST["job_description"],
    $_POST["expire_date"],
    $_POST["id_category"],
    $_POST["job_status"],
    $_POST["salary"],
    $_POST["id_job"]
);
$stm->execute();
$_SESSION["showEditToast"]=1;
header("Location: ../../jobs.php");
// header("Location: ../signup.php?error=1");
