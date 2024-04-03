<?php
require_once "header.php";
require_once "inc/function.inc.php";
$_SESSION['jobs'] = jobs($connection, $_SESSION["id_org"])
?>

<style>
    .job-item {
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


<div id="jobsandcat" class="d-flex overflow-hidden" style="height:90vh">

    <ul id="catId" class="nav nav-tabs flex-column col-2 align-items-center justify-content-around ">
        <li class="nav-item ms-5 ">
            <a class="nav-link border border-0 activeIt text-dark filterIt text-light" aria-current="page" href="#">All Jobs

                <span class="ms-2 badge text-bg-danger">
                    <?php echo count($_SESSION["jobs"]) ?>
                </span>

            </a>

        </li>
        <li class="nav-item  ms-5 ">
            <a class="nav-link border border-0 text-dark filterIt" href="#">Opened

                <span class="ms-2 badge text-bg-danger">

                </span>

            </a>
        </li>
        <li class="nav-item ms-5">
            <a class="nav-link border border-0 text-dark filterIt" href="#">Closed

                <span class="ms-2 badge text-bg-danger">

                </span>

            </a>
        </li>
    </ul>
    <div id="jobsandcat" class="tab-content overflow-auto ms-4 mt-4 " style="width:100vw;">
        <div id="tab-1" class="tab-pane fade show p-0 active">
            <?php
            if (count($_SESSION["jobs"]) == 0) {
                echo "<h1 class='my-5'>You Haven't Posted Any Job Yet!</h1>";
                echo "<h2 class='my-5'>You Can Add one From Here!</h2>";
                echo "<a class='btn btn-primary rounded-0' href='job-send.php'>Add A Job</a>";
            } else {
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
        <!-- <div id="allJobsId" class="allJobs overflow-auto bg-white ps-5 rounded-4 mb-2">

            <?php
            // if (count($_SESSION["jobs"]) == 0)
            //     echo "<h1 class='my-5'>You Haven't Posted Any Job Yet!</h1>";
            // else {
            //     foreach ($_SESSION["jobs"] as $value) {
            //         // echo "<pre>";
            //         // print_r($value);
            //         // echo "</pre>";
            //         // echo "<div class='card my-5'>";
            //         // !card for show
            //         echo ShowJob($connection, $value);
            //         // !end card for show

            //         // !Modal for edit
            //         echo ModalToEdit($connection, $value);
            //         // ! end Modal for edit

            //         // !Modal for listing applicant
            //         echo ModalToList($connection, $value);
            //         // !end for listing applicant


            //     }
            // }
            ?>

        </div> -->


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