<?php
require_once "./inc/connection.php";
session_start();
if (!isset($_SESSION["id_app"]) && !isset($_SESSION["id_org"])) {
    session_destroy();
    header("location: index.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        if (isset($_SESSION["id_app"]))
            echo $_SESSION["fname"] ;
        else if (isset($_SESSION["id_org"]))
            echo $_SESSION["org_name"] ;

        ?>

    </title>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="./assets/am/lib/animate/animate.min.css" rel="stylesheet">
    <link href="./assets/am/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="./assets/am/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/am/img/favicon.ico" rel="icon">


    <!-- Template Stylesheet -->
    <link href="./assets/am/css/style.css" rel="stylesheet">
    <script defer src="./js/jobsorg.js"></script>
    <link rel="stylesheet" href="./css/jobs.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="available.css">

    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.bundle.js" defer></script>
    <!-- <script src="assets/js/main.js" defer></script> -->

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center mb-5 p-2">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="index.php"><img src="assets/sh.png" style="width: 180px;"></a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="
                    <?php
                    if (isset($_SESSION["id_app"]))
                        echo "jobsData.php";
                    else if (isset($_SESSION["id_org"]))
                        echo "jobs.php";

                    ?>">Jobs</a></li>
                    <li>
                        <?php
                        if (isset($_SESSION["id_app"]))
                            echo "<a class='nav-link scrollto' href='checklistjobsapp.php'>Last Projects</a>";
                        else if (isset($_SESSION["id_org"]))
                            echo "<a class='nav-link scrollto' href='job-send.php'>Add Job</a>";

                        ?>
                    </li>
                    <li class="ms-2"><a style="cursor:default;">
                            <?php
                            if (isset($_SESSION["id_app"]))
                                echo $_SESSION["fname"] ;
                            else if (isset($_SESSION["id_org"]))
                                echo $_SESSION["org_name"] ;

                            ?>
                        </a></li>
                    <li><a class="nav-link scrollto" href="<?php
                                                            if (isset($_SESSION["id_app"]))
                                                                echo "applicantProfile.php";
                                                            else if (isset($_SESSION["id_org"]))
                                                                echo "profileorg.php";

                                                            ?>">
                            <img src="<?php
                                        if (isset($_SESSION["id_app"]))
                                            echo $_SESSION["app_pic"];
                                        else if (isset($_SESSION["id_org"]))
                                            echo $_SESSION["org_pic"];

                                        ?>" class="rounded-circle" style="width:40px;height:40px;">
                        </a></li>
                    <li><a href="./inc/logout.php" class="text-danger text-center" style="width:fit-content;">
                            <i class="fa-solid fa-circle-right fs-5 me-2"></i> Logout

                        </a></li>
                </ul>
                <i class="fa-solid fa-bars mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>


    <script src="assets/vendor/purecounter/purecounter_vanilla.js" defer></script>
    <script src="assets/vendor/aos/aos.js" defer></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js" defer></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js" defer></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js" defer></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js" defer></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <script src="assets/js/main.js" defer></script>