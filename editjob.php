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
    <?php

    // echo "<pre>";
    // print_r($_GET["id"]);
    // print_r($_SESSION["jobs"][$_GET["id"]]);
    // echo "</pre>";

    // echo "lol";
    //             print_r($cat);
    ?>

    <!-- <div class="modal" tabindex="-1" style="display: block;position: fixed"> -->
    <!-- Button trigger modal -->
    <!-- <div role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="false">
        <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div> -->

    <form action="./inc//editjob.inc.php" method="post" class=" form-floating d-flex flex-column justify-content-around align-items-center " style="height:85vh;">
        <h1 class="mt-4 ">Edit</h1>
        <input type="text" name="id_job" value="<?php echo $_GET["id"] ?>" hidden>
        <div class="form-floating col-8 d-flex flex-column">
            <input type="text" class="form-control" id="job_title" placeholder="Job Title" name="job_title" value="<?php echo $_SESSION["jobs"][$_GET["id"]]["job_title"]; ?>">
            <label for="job_title">Job Title</label>
        </div>
        <div class="form-floating col-8 d-flex flex-column">
            <input type="text" class="form-control" id="job_description" placeholder="Job Description" name="job_description" value="<?php echo $_SESSION["jobs"][$_GET["id"]]["job_description"] ?>">
            <label for="job_description">Job Description</label>
        </div>
        <div class="form-floating col-8 d-flex flex-column">
            <input type="text" class="form-control" id="salary" placeholder="Salary" name="salary" value="<?php echo $_SESSION["jobs"][$_GET["id"]]["salary"]; ?>">
            <label for="salary">Salary</label>
        </div>
        <div class="form-floating col-8 d-flex flex-column">
            <input type="date" class="form-control" id="expire_date" placeholder="Expire Date" name="expire_date" value="<?php echo $_SESSION["jobs"][$_GET["id"]]["expire_date"] ?>">
            <label for="expire_date">Expire Date</label>
        </div>

        <div class="form-floating col-8 d-flex flex-column">
            <select class="form-select" id="id_category" aria-label="Floating label select example" name="id_category">
                <?php
                $cat = getCategory($connect);
                foreach ($cat as $value) {
                    if ($value["id_category"] == $_SESSION["jobs"][$_GET["id"]]["id_category"])
                        echo "<option value='" . $value["id_category"] . "' selected>" . $value["category"] . "</option>";
                    else

                        echo "<option value='" . $value["id_category"] . "'>" . $value["category"] . "</option>";
                }
                ?>
            </select>
            <label for="id_category">Category</label>
        </div>
        <div class="form-floating ms-5 col-8 d-flex justify-content-center ">
            <div class=" col-2 ">
                <input type="radio" class="btn-check " name="job_status" value="o" id="open" autocomplete="off" <?php if ($_SESSION["jobs"][$_GET["id"]]["job_status"] == "o") echo "checked" ?>>
                <label class="btn btn-outline-success" for="open">Open</label>
            </div>
            <div class=" col-2 ">
                <input type="radio" class="btn-check " value="c" name="job_status" id="closed" autocomplete="off" <?php if ($_SESSION["jobs"][$_GET["id"]]["job_status"] == "c") echo "checked" ?>>
                <label class="btn btn-outline-danger " for="closed">Closed</label>
            </div>
        </div>
        <div class="form-floating col-1 d-flex flex-column">
            <input type="submit" class="btn btn-dark" value="Edit" name="edit">

            <!-- <button type="button" class="btn btn-dark">Edit</button> -->
        </div>
    </form>
    <!-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->

   
</body>

</html>