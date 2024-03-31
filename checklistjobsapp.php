<?php
require("inc/connection.php");
$id = 2;
$appstatus;
if (isset($id)) {

    // $password = mysqli_real_escape_string($connection, $id);
    //the query statement
    $query = "SELECT * FROM job_app where id_app=$id;";
    $query2 = "SELECT lname ,fname  FROM applicant where id_app=$id;";

    $query3 = " SELECT  job_title FROM jobs where id_job in (select id_job from job_app where id_app=$id );";
    //execute SQL queries on the MySQL database
    $result = mysqli_query($connection, $query);
    $res = mysqli_query($connection, $query2);
    $res2 = mysqli_query($connection, $query3);

    // $jobstatus = $row["job_status"];

}
$connection->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    if ($result) {
        $row2 = mysqli_fetch_assoc($res);
        // Loop through each row in the result set
        while ($row = mysqli_fetch_assoc($result)) {
            // Access individual columns by their names
            if ($row["app_status"] == "a") {
                $appstatus = "Applied";
            } elseif ($row["app_status"] == "p") {
                $appstatus = "Pending";
            } elseif ($row["app_status"] == "s") {
                $appstatus = "Shortlisted";
            } elseif ($row["app_status"] == "r") {
                $appstatus = "Rejected";
            }
            // $row2 = mysqli_fetch_assoc($res);
            $row3 = mysqli_fetch_assoc($res2);
            echo "<div>
                    <p>" . $row3["job_title"] . "</p>
                    <p>" . $row2["fname"] . " " . $row2["lname"] . "</p>
      
                    <p>" . $appstatus . "</p>
                    </div> <hr> ";

            // ...and so on
        }
    } else {
        // Query failed
        echo "Error: " . mysqli_error($connection);
    }


    ?>
</body>

</html>