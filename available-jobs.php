<?php

require ("./inc/connection.php");
// $jobsData = $connection->query("select jobs.*,category.category,organization.org_name from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id;");
$DataScienceData = $connection->query("select jobs.*,category.category,organization.* from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id where category = 'Data Science';");
$WritingData = $connection->query("select jobs.*,category.category,organization.* from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id where category = 'Writing';");
$SalesData = $connection->query("select jobs.*,category.category,organization.* from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id where category = 'Sales';");
$CustomerSupportData = $connection->query("select jobs.*,category.category,organization.* from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id where category = 'Customer Support';");
$ProjectManagementData = $connection->query("select jobs.*,category.category,organization.* from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id where category = 'Project Management';");
$DataAnalysisData = $connection->query("select jobs.*,category.category,organization.* from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id where category = 'Data Analysis';");
$categoryData = $connection->query("select * from category");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jobs</title>
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
  <script src="bootstrap/js/bootstrap.bundle.js"></script>
</head>
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
              <?php echo $_SESSION['fname'] ?>
            </a></li>
          <li><a class="nav-link scrollto" href="applicantProfile.php">
              <img src="<?php echo $_SESSION['app_pic'] ?>" class="rounded-circle" style="width:40px;">
            </a></li>
          <li><a href="./inc/logout.php" class="text-danger text-center" style="width:fit-content;">
              <i class="fa-solid fa-circle-right fs-5 me-2"></i> Logout
              
            </a></li>
        </ul>
        <i class="fa-solid fa-bars mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- ======= End Header ======= -->

  <!-- <div class="w-100 mt-5 mb-5"></div> -->

  <div class="row h-100 w-100 mt-5">
    <!-- Sidebar -->
    <sidebar id="sidebarMenu" class="sidebar bg-white col-md-2 d-flex flex-column gap-3 pt-5 ps-4">
      <button class="tab tablinks" onclick="openTab(event, 'all')" id="defaultOpen">All</button>
      <?php
      foreach ($categoryData as $row) {
        echo '<button class="tab tablinks" onclick="openTab(event, ' . $row['id_category'] . ')">' . $row["category"] . '</button>';
      }
      ?>
    </sidebar>
    <!-- Sidebar -->
    <!--Main layout-->
    <main style="margin-top: 40px;" class="tabContent col-md-10">
      <div>
        <form action="jobsData.php" method="post" class="d-flex mt-1 mb-3 px-3" role="newSearch">
          <input class="form-control me-2 w-75" type="Search" name="Search" placeholder="Search" aria-label="Search">
          <button class="btn btn-dark w-25 p-2" type="submit" name="submit">Search</button>
        </form>
      </div>
      <!-- all jobs -->
      <div class="container mb-3 tabcontent" id="all">
          <?php
          if ($jobsData->num_rows) {
            foreach ($jobsData as $row) {
              if ($row['job_status']=="c")
              continue;
              echo '<div class="job-item p-4 mb-4">';
                echo '<div class="row g-4">';
                    echo '<div class="col-sm-12 col-md-8 d-flex align-items-center">';
                        if (($row['org_pic'])) {
                        echo '<img class="flex-shrink-0 img-fluid border rounded" src="'.$row['org_pic'].'" alt="" style="width: 80px; height: 80px;">';
                        }
                        echo '<div class="text-start ps-4">';
                            echo '<h5 class="mb-3">'.$row['job_title'].'</h5>';
                            echo '<span class="text-truncate me-3"><i class="fa-solid fa-list text-primary me-2"></i>'.$row['category'].'</span>';
                            $status;
                            if($row['job_status']=="o"){$status="Opened";}
                            echo '<span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>'.$status.'</span>';
                            echo '<span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$'.$row['salary'].'</span>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">';
                        echo '<div class="d-flex mb-3">';
                            // echo '<a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>';
                            echo '<a class="btn btn-primary rounded-0" href="applyJob-send.php?job-id=' . $row['id_job'] . '">Apply Now</a>';
                        echo '</div>';
                        echo '<small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Expire Date : '.$row['expire_date'].'</small>';
                    echo '</div>';
                echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }

          ?>
      </div>
      <!-- all jobs -->
      <!-- Data Science jobs -->
      <div class="container mb-3 tabcontent" id="1">
          <?php
          if (isset($DataScienceData->num_rows)) {
            foreach ($DataScienceData as $row) {
              echo '<div class="job-item p-4 mb-4">';
              echo '<div class="row g-4">';
                  echo '<div class="col-sm-12 col-md-8 d-flex align-items-center">';
                      if (($row['org_pic'])) {
                      echo '<img class="flex-shrink-0 img-fluid border rounded" src="'.$row['org_pic'].'" alt="" style="width: 80px; height: 80px;">';
                      }
                      echo '<div class="text-start ps-4">';
                          echo '<h5 class="mb-3">'.$row['job_title'].'</h5>';
                          echo '<span class="text-truncate me-3"><i class="fa-solid fa-list text-primary me-2"></i>'.$row['category'].'</span>';
                          $status;
                          if($row['job_status']=="o"){$status="Opened";}
                          echo '<span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>'.$status.'</span>';
                          echo '<span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$'.$row['salary'].'</span>';
                      echo '</div>';
                  echo '</div>';
                  echo '<div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">';
                      echo '<div class="d-flex mb-3">';
                          // echo '<a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>';
                          echo '<a class="btn btn-primary rounded-0" href="applyJob-send.php?job-id=' . $row['id_job'] . '">Apply Now</a>';
                      echo '</div>';
                      echo '<small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Expire Date : '.$row['expire_date'].'</small>';
                  echo '</div>';
              echo '</div>';
            echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }
          ?>
      </div>
      <!-- Data Science jobs -->
      <!-- Writing jobs -->
      <div class="container mb-3 tabcontent" id="2">
          <?php
          if ($WritingData->num_rows) {
            foreach ($WritingData as $row) {
              echo '<div class="job-item p-4 mb-4">';
                echo '<div class="row g-4">';
                    echo '<div class="col-sm-12 col-md-8 d-flex align-items-center">';
                        if (($row['org_pic'])) {
                        echo '<img class="flex-shrink-0 img-fluid border rounded" src="'.$row['org_pic'].'" alt="" style="width: 80px; height: 80px;">';
                        }
                        echo '<div class="text-start ps-4">';
                            echo '<h5 class="mb-3">'.$row['job_title'].'</h5>';
                            echo '<span class="text-truncate me-3"><i class="fa-solid fa-list text-primary me-2"></i>'.$row['category'].'</span>';
                            $status;
                            if($row['job_status']=="o"){$status="Opened";}
                            echo '<span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>'.$status.'</span>';
                            echo '<span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$'.$row['salary'].'</span>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">';
                        echo '<div class="d-flex mb-3">';
                            // echo '<a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>';
                            echo '<a class="btn btn-primary rounded-0" href="applyJob-send.php?job-id=' . $row['id_job'] . '">Apply Now</a>';
                        echo '</div>';
                        echo '<small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Expire Date : '.$row['expire_date'].'</small>';
                    echo '</div>';
                echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }

          ?>
      </div>
      <!-- Writing jobs -->
      <!-- Sales jobs -->
      <div class="container mb-3 tabcontent" id="3">
          <?php
          if ($SalesData->num_rows) {
            foreach ($SalesData as $row) {
              echo '<div class="job-item p-4 mb-4">';
                echo '<div class="row g-4">';
                    echo '<div class="col-sm-12 col-md-8 d-flex align-items-center">';
                        if (($row['org_pic'])) {
                        echo '<img class="flex-shrink-0 img-fluid border rounded" src="'.$row['org_pic'].'" alt="" style="width: 80px; height: 80px;">';
                        }
                        echo '<div class="text-start ps-4">';
                            echo '<h5 class="mb-3">'.$row['job_title'].'</h5>';
                            echo '<span class="text-truncate me-3"><i class="fa-solid fa-list text-primary me-2"></i>'.$row['category'].'</span>';
                            $status;
                            if($row['job_status']=="o"){$status="Opened";}
                            echo '<span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>'.$status.'</span>';
                            echo '<span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$'.$row['salary'].'</span>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">';
                        echo '<div class="d-flex mb-3">';
                            // echo '<a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>';
                            echo '<a class="btn btn-primary rounded-0" href="applyJob-send.php?job-id=' . $row['id_job'] . '">Apply Now</a>';
                        echo '</div>';
                        echo '<small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Expire Date : '.$row['expire_date'].'</small>';
                    echo '</div>';
                echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }
          ?>
      </div>
      <!-- Sales jobs -->
      <!-- Customer Support jobs -->
      <div class="container mb-3 tabcontent" id="4">
          <?php
          if ($CustomerSupportData->num_rows) {
            foreach ($CustomerSupportData as $row) {
              echo '<div class="job-item p-4 mb-4">';
                echo '<div class="row g-4">';
                    echo '<div class="col-sm-12 col-md-8 d-flex align-items-center">';
                        if (($row['org_pic'])) {
                        echo '<img class="flex-shrink-0 img-fluid border rounded" src="'.$row['org_pic'].'" alt="" style="width: 80px; height: 80px;">';
                        }
                        echo '<div class="text-start ps-4">';
                            echo '<h5 class="mb-3">'.$row['job_title'].'</h5>';
                            echo '<span class="text-truncate me-3"><i class="fa-solid fa-list text-primary me-2"></i>'.$row['category'].'</span>';
                            $status;
                            if($row['job_status']=="o"){$status="Opened";}
                            echo '<span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>'.$status.'</span>';
                            echo '<span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$'.$row['salary'].'</span>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">';
                        echo '<div class="d-flex mb-3">';
                            // echo '<a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>';
                            echo '<a class="btn btn-primary rounded-0" href="applyJob-send.php?job-id=' . $row['id_job'] . '">Apply Now</a>';
                        echo '</div>';
                        echo '<small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Expire Date : '.$row['expire_date'].'</small>';
                    echo '</div>';
                echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }

          ?>
        </div>
      <!-- Customer Support jobs -->
      <!-- Project Management jobs -->
      <div class="container mb-3 tabcontent" id="5">
          <?php
          if ($ProjectManagementData->num_rows) {
            foreach ($ProjectManagementData as $row) {
              echo '<div class="job-item p-4 mb-4">';
                echo '<div class="row g-4">';
                    echo '<div class="col-sm-12 col-md-8 d-flex align-items-center">';
                        if (($row['org_pic'])) {
                        echo '<img class="flex-shrink-0 img-fluid border rounded" src="'.$row['org_pic'].'" alt="" style="width: 80px; height: 80px;">';
                        }
                        echo '<div class="text-start ps-4">';
                            echo '<h5 class="mb-3">'.$row['job_title'].'</h5>';
                            echo '<span class="text-truncate me-3"><i class="fa-solid fa-list text-primary me-2"></i>'.$row['category'].'</span>';
                            $status;
                            if($row['job_status']=="o"){$status="Opened";}
                            echo '<span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>'.$status.'</span>';
                            echo '<span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$'.$row['salary'].'</span>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">';
                        echo '<div class="d-flex mb-3">';
                            // echo '<a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>';
                            echo '<a class="btn btn-primary rounded-0" href="applyJob-send.php?job-id=' . $row['id_job'] . '">Apply Now</a>';
                        echo '</div>';
                        echo '<small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Expire Date : '.$row['expire_date'].'</small>';
                    echo '</div>';
                echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }

          ?>
      </div>
      <!-- Project Management jobs -->
      <!-- Data Analysis jobs -->
      <div class="container mb-3 tabcontent" id="6">
          <?php
          if (($DataAnalysisData->num_rows)) {
            foreach ($DataAnalysisData as $row) {
              echo '<div class="job-item p-4 mb-4">';
                echo '<div class="row g-4">';
                    echo '<div class="col-sm-12 col-md-8 d-flex align-items-center">';
                        if (($row['org_pic'])) {
                        echo '<img class="flex-shrink-0 img-fluid border rounded" src="'.$row['org_pic'].'" alt="" style="width: 80px; height: 80px;">';
                        }
                        echo '<div class="text-start ps-4">';
                            echo '<h5 class="mb-3">'.$row['job_title'].'</h5>';
                            echo '<span class="text-truncate me-3"><i class="fa-solid fa-list text-primary me-2"></i>'.$row['category'].'</span>';
                            $status;
                            if($row['job_status']=="o"){$status="Opened";}
                            echo '<span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>'.$status.'</span>';
                            echo '<span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$'.$row['salary'].'</span>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">';
                        echo '<div class="d-flex mb-3">';
                            // echo '<a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>';
                            echo '<a class="btn btn-primary rounded-0" href="applyJob-send.php?job-id=' . $row['id_job'] . '">Apply Now</a>';
                        echo '</div>';
                        echo '<small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Expire Date : '.$row['expire_date'].'</small>';
                    echo '</div>';
                echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }
          ?>
      </div>
      <!-- Data Analysis jobs -->

    </main>
    <!--Main layout-->
  </div>
</body>
<script>
  function openTab(evt, category) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
      console.log(category)
    }
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(category).style.display = "block";
    evt.currentTarget.className += " active";
  }
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
</script>
<script src="assets/js/main.js"></script>

</html>