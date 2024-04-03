<?php

require_once "header.php";
$id = $_SESSION["id_app"];
// $id = 2;
$appstatus;
if (isset($id)) {
    $query = "SELECT * FROM job_app where id_app=$id;";
    $query2 = "SELECT lname ,fname  FROM applicant where id_app=$id;";
    $query3 = " SELECT  job_title FROM jobs where id_job in (select id_job from job_app where id_app=$id );";

    $shortlisted = "SELECT * FROM job_app where id_app= and app_status='s';";
    $applied = "SELECT * FROM job_app where id_app= and app_status='a';";
    $rejected = "SELECT * FROM job_app where id_app= and app_status='r';";
    $pending = "SELECT * FROM job_app where id_app= and app_status='p';";

    $result = mysqli_query($connection, $query);
    $res = mysqli_query($connection, $query2);
    $res2 = mysqli_query($connection, $query3);
}
$connection->close();
?>

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


    <!-- ======= End Header ======= -->
    <main class="mt-5 pt-5">
        <p class="text-center text-black-50">
            <?php echo 'Here are the jobs you submitted a proposal for'; ?>
        </p>
        <div class="buttons d-flex justify-content-center align-items-center gap-4 mb-4 flex-wrap">
            <button class="btn bg-dark p-1 px-4 text-white bg-opacity-50 btnclick  rounded-pill" onclick="openTab(event, 'All')">All</button>
            <button class="btn bg-primary p-1 px-4 text-dark bg-opacity-50 btnclick  rounded-pill" onclick="openTab(event, 'Applied')">Applied</button>
            <button class="btn bg-danger p-1 px-4 text-dark bg-opacity-50 btnclick  rounded-pill" onclick="openTab(event, 'Rejected')">Rejected</button>
            <button class="btn bg-success p-1 px-4 text-dark bg-opacity-50 btnclick  rounded-pill" onclick="openTab(event, 'Shortlisted')">Shortlisted</button>
            <button class="btn bg-warning p-1 px-4 text-dark bg-opacity-50 btnclick  rounded-pill" onclick="openTab(event, 'Pending')">Pending</button>
        </div>

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

                    $row3 = mysqli_fetch_assoc($res2);
                    echo "<div class='job-item $appstatus p-4 mb-4'>";
                    echo '<div class="row g-4">';
                    echo '<div class="col-sm-12 col-md-8 d-flex align-items-center">';
                    echo '<div class="text-start ps-4">';
                    echo '<h4 class="mb-3">' . $row3["job_title"] . '</h4>';
                    $status;
                    if ($row["app_status"] == "r") {
                        echo '<span class="text-truncate me-3"><i class="fa-solid fa-xmark text-danger me-2"></i>' . $appstatus . '</span>';
                    } else if ($row["app_status"] == "a") {
                        echo '<span class="text-truncate me-3"><i class="fa-solid fa-check text-primary me-2"></i>' . $appstatus . '</span>';
                    } else if ($row["app_status"] == "p") {
                        echo '<span class="text-truncate me-3"><i class="fa-solid fa-spinner text-warning me-2"></i>' . $appstatus . '</span>';
                    } else if ($row["app_status"] == "s") {
                        echo '<span class="text-truncate me-3"><i class="fa-solid fa-arrow-up-short-wide text-success me-2"></i>' . $appstatus . '</span>';
                    }
                    // echo '<span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$'.$row['salary'].'</span>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">';
                    echo '<div class="d-flex mb-3">';
                    echo '</div>';
                    echo '<small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Application Date : ' . $row["app_date"] . '</small>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        } else {
            echo "<h2 class='text-center'>Nothing here .. yet</h2>";
        }
        ?>
    </main>

</body>
<script>
    function openTab(evt, status) {
        var i, job, btn;
        job = document.getElementsByClassName("job-item");
        btn = document.getElementsByClassName("btnclick");
        console.log(status)

        for (i = 0; i < job.length; i++) {
            if (status == "All") {
                job[i].style.display = "block";
            } else if (job[i].classList.contains(status)) {
                job[i].style.display = "block";
            } else {
                job[i].style.display = "none";
            }
        }
        for (i = 0; i < btn.length; i++) {
            btn[i].className = btn[i].className.replace(" bg-opacity-75", "bg-opacity-50");
        }
        evt.currentTarget.className.replace(" bg-opacity-50", "bg-opacity-75");
    }
</script>
<script src="assets/js/main.js"></script>

</html>