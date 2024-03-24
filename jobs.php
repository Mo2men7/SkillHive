<?php
require_once "header.php";
require_once "inc/function.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <?php
        $jobs = jobs($_SESSION["id_org"]);

        foreach ($jobs as $value) {
            // echo "<pre>";
            // print_r($value);
            // echo "</pre>";
            echo "<div class='card my-5'>";
            echo "<div class='card-header'>";
            echo $value["job_title"];
            echo "</div>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>" . $value["job_description"] . "</h5>";
            echo "Salary :<span class='card-text'>" . $value["salary"] ;
            echo "<div>";
            echo "<h5 class='card-title'>Category</h5>";
            foreach ($value["category"] as $cat)
                echo "<span class='badge text-bg-secondary me-2'>" . $cat . "</span>";
            echo "</div>";
            // echo "";
            if ($value["job_status"] == "o")
                echo " <h5 class='card-title'>Job Status : <span class='text-success'>Open.</span></h5>";
            else
            echo " <h5 class='card-title'>Job Status : <span class='text-danger'>Close.</span></h5>";
            echo " <h5 class='card-title'>Expire Date : <span class='text-danger'>".$value["expire_date"]."</span></h5>";

            echo "</div>";
            echo "</div>";
        } ?>
    </div>
</body>

</html>