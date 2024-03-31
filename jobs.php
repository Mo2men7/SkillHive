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

<body >
    <div class="container">

        <?php

        foreach ($_SESSION["jobs"] as $value) {
            // echo "<pre>";
            // print_r($value);
            // echo "</pre>";
            // echo "<div class='card my-5'>";
            // !card for show
            echo ShowJob($connect, $value);
            // !end card for show

            // !Modal for edit
            echo ModalToEdit($connect, $value);
            // ! end Modal for edit

            // !Modal for listing applicant
            echo ModalToList($connect, $value);
            // !end for listing applicant


        }

        ?>

    </div>


    <!-- // * toast start -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3 ">
        <div id="liveToast" class="toast 
        <?php if (isset($_SESSION["showEditToast"])) {
            echo "show";
            unset($_SESSION["showEditToast"]);
        } ?>" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header ">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <i class="fa-regular fa-bell me-2"></i>
                <strong class="me-auto"> Edit Done !</strong>
                <!-- <small>11 mins ago</small> -->
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <!-- <div class="toast-body">
                Hello, world! This is a toast message.
            </div> -->
        </div>
    </div>
    <!-- // * toast end -->

</body>

</html>