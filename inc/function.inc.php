<?php
function jobs($org_id)
{
    require_once "connect.php";
    $stmjob = $connect->prepare("SELECT * FROM jobs where jobs.org_id=?;
   ");

    $stmjob->execute([
        $org_id
    ]);

    $resjob = $stmjob->fetchAll();
    // echo "<pre>";
    // print_r($resjob);
    // echo "</pre>";
    $newjobarray = $resjob;
    $stmcat = $connect->prepare("SELECT jobs.id_job , category.category FROM jobs LEFT JOIN job_category ON job_category.id_job = jobs.id_job LEFT JOIN category ON job_category.id_category = category.id_category where jobs.org_id=?;
   ");

    $stmcat->execute([
        $org_id
    ]);

    $rescat = $stmcat->fetchAll();

    foreach ($resjob as $jobkey => $jobinfo) {
        // echo "<pre>";
        // print_r($jobinfo);
        // echo "</pre>";
        // echo $jobinfo["id_job"];

        foreach ($rescat as $key => $value) {
            if ($value["id_job"] == $jobinfo["id_job"]) {
                // echo " works";
                if (!isset($resjob[$jobkey]["category"]))
                    $resjob[$jobkey]["category"] = array();
                array_push($resjob[$jobkey]["category"], $value["category"]);
            }
            // echo "<pre>";
            // print_r($value);
            // echo "</pre>";
        }
    }
    // echo "<pre>";
    // print_r($resjob);
    // echo "</pre>";
    return $resjob;
}
     
    // foreach($res as $key => $value)
    // {
    // $stmjobcat = $connect->prepare("SELECT * FROM job_category

    // WHERE id_job=?;");

    // $stmcat->execute([
    //     $value["id_job"]
    // ]);

//    $res= $stmjob->fetchAll();
//    echo "<pre>";
//    print_r($res) ; 
//    echo "</pre>";

        
//     print_r($value["id_job"]) ; 
    
//     } 
// }
// SELECT jobs.*, category.category   FROM (
//     (jobs  INNER JOIN job_category as jc ON jc.id_job = jobs.id_job ) INNER JOIN
//     (job_category INNER JOIN category ON job_category.id_category = category.id_category)) where jobs.org_id = 1 ;
    
    
    
// (select job_category.id_job , category.category from  job_category INNER join category on  job_category.id_category = category.id_category)
