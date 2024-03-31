<?php
require("inc/connection.php");
$id = "o";
$jobstatus;

if (isset($_POST["submit"])) {
    // Prepare the SQL queries
    $query =  "SELECT * FROM jobs WHERE job_title LIKE '%{$_POST['search']}%' and job_status='o'";
    $query2 = "SELECT org_name FROM organization WHERE id_org IN (SELECT org_id FROM jobs WHERE job_status='o')";

    // Execute SQL queries
    $res = mysqli_query($connection, $query);
    $res2 = mysqli_query($connection, $query2);

    if (!$res || !$res2) {
        // Query failed
        echo "Error: " . mysqli_error($connection);
    } else {
        // Fetch organization row
        $row2 = mysqli_fetch_assoc($res2);

        // Loop through each row in the result set
        while ($row = mysqli_fetch_assoc($res)) {
            // Determine job status
            if ($row["job_status"] == "o") {
                $jobstatus = "opening";
            } elseif ($row["job_status"] == "c") {
                $jobstatus = "closed";
            }

            // Output job information
            echo "<div>
            <p>" . $row["job_title"] . "</p>
            <p>" . $row["job_description"] . "</p>
            <p>" . $row["publish_date"] . "</p>
            <p>" . $row["expire_date"] . "</p>
            <p>" . $row2["org_name"] . "</p>
            <p>" . $jobstatus . "</p>
            </div> <hr>";
        }

        // Free result sets
        mysqli_free_result($res);
        mysqli_free_result($res2);
    }
}

$connection->close();
