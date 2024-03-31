<?php

require_once "connection.php";
$_SESSION["jobs"] = jobs($connect, $_SESSION["id_org"]);
function jobs($connect, $org_id)
{
    // require_once "connect.php";
    $stmjob = $connect->prepare("SELECT jobs.* ,category.category FROM jobs inner join category on jobs.id_category = category.id_category where jobs.org_id=?;
   ");

    $stmjob->execute([
        $org_id
    ]);

    $resjob = $stmjob->fetchAll();
    $fixingId = array();
    foreach ($resjob as $job) {
        $fixingId[$job["id_job"]] = $job;
        $stmapp = $connect->prepare("SELECT applicant.* , job_app.* from applicant inner join job_app on applicant.id_app=job_app.id_app where job_app.id_job=?;");

        $stmapp->execute([
            $job["id_job"]
        ]);
        $resapp = $stmapp->fetchAll();
        foreach ($resapp as $app) {
            $fixingId[$job["id_job"]]["applicants"][$app["id_app"]] = $app;
        }
    }
    return $fixingId;
}
function getCategory($connect)
{
    $stm = $connect->prepare("SELECT * FROM category;");
    $stm->execute();
    $res = $stm->fetchAll();
    return $res;
}
