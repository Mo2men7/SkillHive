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
<script defer src="./js/jobsorg.js"></script>

<body>

    <div class="d-flex justify-content-between  overflow-hidden" style="height:90vh">
        <ul class=" nav nav-tabs flex-column col-2 align-items-center justify-content-around bg-dark" style="height:91vh ;">
            <li class="nav-item ms-5 " style="width:80%; ">
                <a class="nav-link border border-0 active text-dark filterIt text-light" aria-current="page" href="#">All Jobs

                <span class="ms-2 badge text-bg-danger">
                        <?php echo count($_SESSION["jobs"])?>
                        </span>
           
                </a>
                 
            </li>
            <li class="nav-item  ms-5" style="width:80%;">
                <a class="nav-link border border-0 text-light filterIt" href="#">Opened

                <span class="ms-2 badge text-bg-danger">
                        
                        </span>
           
                </a>
            </li>
            <li class="nav-item ms-5" style="width:80%;">
                <a class="nav-link border border-0 text-light filterIt" href="#">Closed

                <span class="ms-2 badge text-bg-danger">
                        
                        </span>
           
                </a>
            </li>

        </ul>
        <div class="allJobs container overflow-auto ms-4">

            <?php
            if (count($_SESSION["jobs"]) == 0)
                echo "<h1 class='my-5'>You Haven't Posted Any Job Yet!</h1>";
            else {
                foreach ($_SESSION["jobs"] as $value) {
                    // echo "<pre>";
                    // print_r($value);
                    // echo "</pre>";
                    // echo "<div class='card my-5'>";
                    // !card for show
                    echo ShowJob($connection, $value);
                    // !end card for show

                    // !Modal for edit
                    echo ModalToEdit($connection, $value);
                    // ! end Modal for edit

                    // !Modal for listing applicant
                    echo ModalToList($connection, $value);
                    // !end for listing applicant


                }
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
    </div>
</body>

</html>