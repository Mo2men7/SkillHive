<?php
require("inc/connection.php");
session_start();
$u = $_SESSION["email"];
$p = $_SESSION["password"];

$dataID;
$dataFirstName;
$dataLastName;
$dataUserName;
$dataDateOfBirth;
$dataGender;
$dataEmail;
$dataPassword;
$dataCountry;

// if(isset($_POST['username']) && isset($_POST['password'])) {
if (isset($u) && isset($p)) {
  $username = mysqli_real_escape_string($connection, $u);
  $password = mysqli_real_escape_string($connection, $p);

  //the query statement
  $query = "SELECT * FROM organization WHERE email='$username' AND password='$password'";
  $query2 = "SELECT * from jobs where org_id=" . $_SESSION["id_org"] . " limit 1;";
  //execute SQL queries on the MySQL database
  $result = mysqli_query($connection, $query);
  $result2 = mysqli_query($connection, $query2);
  if (mysqli_num_rows($result) > 0) {
    // getting the row of the target data
    $row = mysqli_fetch_assoc($result);
    $row2 = mysqli_fetch_assoc($result2);
    $dataOrgPic = $row["org_pic"];
    $dataID = $row['id_org'];
    $dataOrgName = $row['org_name'];
    $dataDateOfest = $row['date_of_est'];
    $dataEmail = $row['email'];
    $dataPassword = $row['password'];
    $dataLocation = $row['location'];
    $datapic = $row['org_pic'];
    $jobtitle = $row2["job_title"];
    $jobdesc = $row2["job_description"];
  } else {
    echo "Bye!";
  }
} else {
  header("Location:applicantRegister.php");
}
$connection->close();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $dataFirstName . " Profile"; ?></title>
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
  <script src="bootstrap/js/bootstrap.bundle.js"></script>
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
          <li><a class="nav-link scrollto" href="jobsData.php">Jobs</a></li>
          <li><a class="nav-link scrollto" href="checklistjobsapp.php">Last Projects</a></li>
          <li class="ms-2"><a style="cursor:default;">
              <?php echo $dataOrgName ?>
            </a></li>
          <li><a class="nav-link scrollto" href="applicantProfile.php">
              <img src="<?php echo $dataOrgPic ?>" class="rounded-circle" style="width:40px;">
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


  <section style="background-color: #eee;">
    <div class="container py-5">
      <p class="bg-dark text-light text-center fs-3">Welcome, Talent</p>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="<?php echo $dataOrgPic ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3"><?php echo $dataOrgName ?></h5>

              <p class="text-muted mb-4"><?php echo $dataLocation ?></p>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $dataOrgName ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $dataEmail ?></p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Location</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $dataLocation ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h6 class="card-subttile">Last Job</h6>
              <h5 class="card-title"><?php echo $jobtitle ?></h5>

              <p class="card-text"><?php echo $jobdesc ?></p>

            </div>
          </div>
        </div>

      </div>

    </div>


  </section>
  <!-- ======= Footer ======= -->
  <footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <img src="assets/sh.png" style="width:140px;">
            </h6>
            <p>
              SkillHive is a freelance website or job portal website as known in common that allows organizations after
              register to post their jobs to get the applicants' attention to it so one of the experts can finish it.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p>
              <i class="fas fa-envelope me-3"></i>
              support@skillhive.com
            </p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2024 Copyright:
      <a class="text-reset fw-bold" href="index.php">SKILLHIVE</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- End Footer -->
</body>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</html>