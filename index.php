<?php
session_start();
if (isset($_SESSION["id_app"]) || isset($_SESSION["id_org"])) {
  if (isset($_SESSION["id_app"]))
    header("location: applicantProfile.php");
  else
    header("location: profileorg.php");
} else {
  session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SkillHive</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/vendor/fontawesome/css/all.min.css">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Vesperr
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
      .featured_candidates_area {
        background: #F5F7FA;
        padding-bottom: 100px;
      }

      .featured_candidates_area.candidate_page_padding {
        padding-top: 100px;
      }

      .featured_candidates_area.candidate_page_padding .single_candidates {
        margin-bottom: 30px;
      }

      .featured_candidates_area .single_candidates {
        background: #fff;
        border-radius: 5px;
        padding: 35px 45px;
      }

      @media (min-width: 768px) and (max-width: 991px) {
        .featured_candidates_area .single_candidates {
          padding: 25px 30px;
        }
      }

      @media (min-width: 992px) and (max-width: 1200px) {
        .featured_candidates_area .single_candidates {
          padding: 25px 20px;
        }
      }

      .featured_candidates_area .single_candidates .thumb {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        margin: auto;
      }

      .featured_candidates_area .single_candidates .thumb img {
        width: 100%;
        border-radius: 50%;
      }

      .featured_candidates_area .single_candidates h4 {
        font-size: 20px;
        font-weight: 400;
        color: #001D38;
        margin-top: 24px;
        margin-bottom: 6px;
        transition: 0.3s;
      }

      .featured_candidates_area .single_candidates p {
        font-size: 16px;
        font-weight: 400;
        color: #AAB1B7;
        margin-bottom: 0;
      }

      .featured_candidates_area .single_candidates:hover h4 {
        color: #3498db;
      }
    </style>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="shadow fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <a href="index.php"><img src="assets/sh.png" style="width: 180px;"></a>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#categories">Categories</a></li>
          <!-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
          <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
          <li><a class="getstarted scrollto" href="choose-start.html">Sign In</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Get in touch with experts in SKILL HIVE</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">As a freelancer you can apply to a job <br>As an organization you
            can hire a talent</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="choose-start.html" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients clients">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="" data-aos="zoom-in">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="200">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="300">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="400">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="500">
          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <p class="my-3" data-aos="fade-up" data-aos-delay="150">
            SkillHive is a freelance website or job portal website as known in common that allows organizations after
            register to post their jobs to get the applicants' attention to it so one of the experts can finish it
          </p>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <p>
              Organizations :
            <ul>
              <li>Post a job vacancy on the platform. (Job posting must have an expiry date so if it is expired it won’t
                be visible for applicants any more).</li>
              <li>Follow the already opened vacancies.</li>
              <li>Close previously opened job vacancy so that new applicants can’t access it any more.</li>
              <li>Check each opened vacancy applicants list.</li>
            </ul>
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <p>
              Applicants :
            <ul>
              <li>Check list of available vacancies.</li>
              <li>Filter job vacancies by his own preferences (Job type)</li>
              <li>Search a specific job openings.</li>
              <li>Apply for a job (Uploading his CV and filling the required form inputs).</li>
              <li>Check the list of jobs the user applied to previously.</li>
              <li>Filter list by the application status.</li>
            </ul>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <!-- <section id="counts" class="counts">
      <div class="container">

        <div class="row">
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start"
            data-aos="fade-right" data-aos-delay="150">
            <img src="assets/img/counts-img.svg" alt="" class="img-fluid">
          </div>

          <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-emoji-smile"></i>
                    <span data-purecounter-start="0" data-purecounter-end="65" data-purecounter-duration="1"
                      class="purecounter"></span>
                    <p><strong>Happy Clients</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut.</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-journal-richtext"></i>
                    <span data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1"
                      class="purecounter"></span>
                    <p><strong>Projects</strong> adipisci atque cum quia aspernatur totam laudantium et quia dere tan
                    </p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-clock"></i>
                    <span data-purecounter-start="0" data-purecounter-end="18" data-purecounter-duration="1"
                      class="purecounter"></span>
                    <p><strong>Years of experience</strong> aut commodi quaerat modi aliquam nam ducimus aut voluptate
                      non vel</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-award"></i>
                    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1"
                      class="purecounter"></span>
                    <p><strong>Awards</strong> rerum asperiores dolor alias quo reprehenderit eum et nemo pad der</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section> -->
    <!-- End Counts Section -->

    <!-- ======= Categories Section ======= -->
    <section id="categories" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Categories</h2>
          <p>Here are our 6 main categories .. till now</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box">
              <i class="fa-solid fa-chart-simple" style="color: #ffbb2c;"></i>
              <h3>Data Science</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="fa-solid fa-paragraph" style="color: #5578ff;"></i>
              <h3>Writing</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="fa-solid fa-wallet" style="color: #e80368;"></i>
              <h3>Sales</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="fa-solid fa-info" style="color: #e361ff;"></i>
              <h3>Customer Support</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="fa-solid fa-list-check" style="color: #47aeff;"></i>
              <h3>Project Management</h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="fa-solid fa-magnifying-glass-chart" style="color: #ffa76e;"></i>
              <h3>Data Analysis</h3>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Categories Section -->

    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="member-img">
                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section> -->
    <!-- End Team Section -->

    <!-- ======= Applicants Section ======= -->
    <div class="featured_candidates_area candidate_page_padding">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Our Talents</h2>
        </div>
        <div class="row">
          <?php
          require ("./inc/connection.php");
          $applicants = $connection->query("select * from applicant;");
          foreach ($applicants as $app) {
            echo '<div class="col-md-6 col-lg-3">';
            echo '<div class="single_candidates text-center">';
            echo '<div class="thumb">';
            echo '<img src="' . $app['app_pic'] . '">';
            echo '</div>';
            echo '<a href="#"><h4>' . $app['fname'] . $app['lname'] . '</h4></a>';
            echo '<p>' . $app['job_title'] . '</p>';
            echo '</div>';
            echo '</div>';
          }
          ?>
        </div>
      </div>
    </div>
    <!-- End Applicants Section -->

  </main><!-- End #main -->

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

  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>