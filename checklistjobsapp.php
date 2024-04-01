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
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        .box {
            background-color: #fff;
            background-color: #fff;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            border: 4px solid #1ea0d5;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }

        .box div {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .box div .title {
            font-size: larger;

        }

        .box div .value {
            width: 75%;
            font-size: larger;
            font-weight: 600;

        }
    </style>
</head>

<body class=" bg-body-secondary">
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-light fw-bold">SkillHive</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
                        <a class="nav-link text-light">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light">Profile</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                    <button class="btn btn-light" type="submit" name="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
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
            echo "<div class='box'>
            <div>
                    <p class='title'>Job Title:</p>
                    <p class='value'>" . $row3["job_title"] . "</p>
                    </div>
                
                    <div>
                    <p class='title'>Job Status:</p>
                    <p class='value'>" . $appstatus . "</p>
                    </div>
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