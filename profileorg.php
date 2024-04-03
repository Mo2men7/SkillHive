<?php
require_once "header.php";
// session_start();
// echo "<pre>";
// // print_r($_SESSION);
// print_r(max($_SESSION["jobs"]));
// echo "</pre>";

// exit();
require_once "inc/function.inc.php";
$_SESSION['jobs']=jobs($connection, $_SESSION["id_org"]);
// echo "<pre>";
// print_r($_SESSION);
// print_r();
// echo "</pre>";
// exit();
?>

  <section style="background-color: #eee;">
    <div class="container py-5">
      <p class="bg-dark text-light text-center fs-3">Welcome, Talent</p>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="<?php echo$_SESSION["org_pic"]?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3"><?php echo $_SESSION["org_name"] ?></h5>

              <p class="text-muted mb-4"><?php echo $_SESSION["location"]  ?></p>
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
                  <p class="text-muted mb-0"><?php echo $_SESSION["org_name"] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $_SESSION["email"]  ?></p>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Location</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $_SESSION["location"] ?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h6 class="card-subttile">Last Job</h6>
              
              
              <h5 class="card-title"><?php  
              if (count($_SESSION["jobs"])==0)
              echo "No Jobs Added Yet!";
            else
            echo $_SESSION["jobs"][max(array_keys($_SESSION["jobs"]))]["job_title"]  ?></h5>
              <p class="card-text"><?php 
              if (count($_SESSION["jobs"])==0)
              echo "";
            else
            echo $_SESSION["jobs"][max(array_keys($_SESSION["jobs"]))]["job_description"] ?></p>

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