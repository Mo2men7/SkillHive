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
    <link href="./assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="./assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./assets/css/style.css" rel="stylesheet">
    <script defer src="./js/jobsorg.js"></script>
    <link rel="stylesheet" href="./css/jobs.css">
    <style>

    </style>
</head>

<body>


    <div id="jobsandcat" class="d-flex overflow-hidden" style="height:100vh">

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
        <div class="tab-content overflow-auto ms-4 mt-4 ">
        <div id="tab-1" class="tab-pane fade show p-0 active">
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