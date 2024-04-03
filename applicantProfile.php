<?php
require("./inc/connection.php");
require_once "header.php";
// $u = $_SESSION["appemail"];
// $p = $_SESSION["apppassword"];


// $dataID;
// $dataFirstName;
// $dataLastName;
// $dataUserName;
// $dataDateOfBirth;
// $dataGender;
// $dataEmail;
// $dataPassword;
// $dataCountry;

// if(isset($_POST['username']) && isset($_POST['password'])) {
// if (isset($u) && isset($p)) {
//   $username = mysqli_real_escape_string($connection, $u);
//   $password = mysqli_real_escape_string($connection, $p);

//   //the query statement
//   $query = "SELECT * FROM applicant WHERE email='$username' AND password='$password'";
//   //execute SQL queries on the MySQL database
//   $result = mysqli_query($connection, $query);

//   if (mysqli_num_rows($result) > 0) {
//     // getting the row of the target data
//     $row = mysqli_fetch_assoc($result);
//     $dataID = $row['id_app'];
//     $dataFirstName = $row['fname'];
//     $dataLastName = $row['lname'];
//     $dataUserName = $row['user_name'];
//     $dataDateOfBirth = $row['date_of_birth'];
//     $dataGender = $row['gender'];
//     $dataEmail = $row['email'];
//     $dataPassword = $row['password'];
//     $dataCountry = $row['country'];
//     $dataphone = $row["phone"];
//     $dataaddress = $row['address'];
//     $jobtitle = $row["job_title"];
//   } else {
//     echo "Bye!";
//   }
// } else {
//   header("Location:choose-start.html");
// }
// $connection->close();

?>

  <section style="background-color: #eee;">
    <div class="container py-5">
      <p class="bg-dark text-light text-center fs-3">Welcome, Talent</p>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="<?php echo $_SESSION['app_pic'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3"><?php echo $_SESSION["fname"] . " " . $_SESSION["lname"] ?></h5>
              <p class="text-muted mb-4"><?php echo $_SESSION["job_title"] ?></p>
              <p class="text-muted mb-1"><?php echo $_SESSION["address"] ?></p>
              <p class="text-muted mb-4"><?php echo  $_SESSION["phone"]  ?></p>
            </div>
          </div>
          <!-- <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fas fa-globe fa-lg text-warning"></i>
                  <p class="mb-0">https://mdbootstrap.com</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                  <p class="mb-0">mdbootstrap</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                  <p class="mb-0">@mdbootstrap</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                  <p class="mb-0">mdbootstrap</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                  <p class="mb-0">mdbootstrap</p>
                </li>
              </ul>
            </div>
          </div> -->
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $_SESSION["fname"] . " " . $_SESSION["lname"] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $_SESSION["email"] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $_SESSION["phone"] ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?php echo $_SESSION["address"] ?></p>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="row">
            <div class="col-md-6">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                  </p>
                  <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                  <div class="progress rounded mb-2" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                  </p>
                  <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                  <div class="progress rounded mb-2" style="height: 5px;">
                    <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
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