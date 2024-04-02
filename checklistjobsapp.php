<?php
require("inc/connection.php");
session_start();
$id = $_SESSION["id_app"];
// $id = 2;
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
    <title>Last jobs</title>
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!-- vencdors -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <style>
        .job-item {
            margin-left: auto;
            margin-right: auto;
            width: 65%;
            border: 1px solid transparent;
            border-radius: 2px;
            transition: .3s;
            background-color: white;
        }

        .job-item:hover {
            box-shadow: 0 0 45px rgba(0, 0, 0, .08);
            border-color: rgba(0, 0, 0, .08);
            transform: scale(1.015, 1.015);
        }
    </style>
</head>

<?php
session_start();
?>

<body style="background:#eee;">
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center mb-5 p-2">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="index.php"><img src="assets/sh.png" style="width: 180px;"></a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="jobsData.php">Jobs</a></li>
                    <li><a class="nav-link scrollto" href="checklistjobsapp.php">Last Projects</a></li>
                    <li class="ms-2"><a style="cursor:default;">
                            <?php echo $_SESSION['fname'] ?>
                        </a></li>
                    <li><a class="nav-link scrollto" href="applicantProfile.php">
                            <img src="<?php echo $_SESSION['app_pic'] ?>" class="rounded-circle" style="width:40px;">
                        </a></li>
                    <li><a href="jobsData.php?logout=1" class="text-danger text-center" style="width:fit-content;">
                            <i class="fa-solid fa-circle-right fs-5 me-2"></i> Logout
                            <?php
                            if (isset($_GET['logout']) && $_GET['logout'] == 1) {
                                session_destroy();
                                header('Location:index.php');
                            }
                            ?>
                        </a></li>
                </ul>
                <i class="fa-solid fa-bars mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <!-- ======= End Header ======= -->
    <main class="mt-5 pt-5">
        <p class="text-center text-black-50"><?php echo 'Here are the jobs you submitted a proposal for'; ?></p>
        <?php

        if ($result->num_rows) {
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
                    echo '<div class="job-item p-4 mb-4">';
                    // echo "<pre>";
                    // print_r($row);
                    // echo "</pre>";
                    // echo "<pre>";
                    // var_dump($row);
                    // echo "</pre>";
                    // echo "<pre>";
                    // var_dump($row2);
                    // echo "<pre>";
                    // echo "<pre>";
                    // var_dump($row3);
                    // echo "</pre>";
                    echo '<div class="row g-4">';
                    echo '<div class="col-sm-12 col-md-8 d-flex align-items-center">';
                    // if (($row['org_pic'])) {
                    // echo '<img class="flex-shrink-0 img-fluid border rounded" src="'.$row['org_pic'].'" alt="" style="width: 80px; height: 80px;">';
                    // }
                    echo '<div class="text-start ps-4">';
                    echo '<h4 class="mb-3">' . $row3["job_title"] . '</h4>';
                    // echo '<span class="text-truncate me-3"><i class="fa-solid fa-list text-primary me-2"></i>'.$row['category'].'</span>';
                    $status;
                    if ($row["app_status"] == "r") {
                        echo '<span class="text-truncate me-3"><i class="fa-solid fa-xmark text-primary me-2"></i>' . $appstatus . '</span>';
                    } else if ($row["app_status"] == "a") {
                        echo '<span class="text-truncate me-3"><i class="fa-solid fa-check text-primary me-2"></i>' . $appstatus . '</span>';
                    } else if ($row["app_status"] == "p") {
                        echo '<span class="text-truncate me-3"><i class="fa-solid fa-spinner text-primary me-2"></i>' . $appstatus . '</span>';
                    } else if ($row["app_status"] == "s") {
                        echo '<span class="text-truncate me-3"><i class="fa-solid fa-arrow-up-short-wide text-primary me-2"></i>' . $appstatus . '</span>';
                    }
                    // echo '<span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$'.$row['salary'].'</span>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">';
                    echo '<div class="d-flex mb-3">';
                    // echo '<a class="btn btn-primary rounded-0" href="applyJob-send.php?job-id=' . $row['id_job'] . '">Apply Now</a>';
                    echo '</div>';
                    echo '<small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Application Date : ' . $row["app_date"] . '</small>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    // ...and so on
                }
            } else {
                // Query failed
                echo "Error: " . mysqli_error($connection);
            }
        } else {
            echo "<h2 class='text-center'>Nothing here .. yet</h2>";
        }

        ?>
    </main>

</body>

</html>