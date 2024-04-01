<?php

require("./inc/connection.php");
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
        <a href= "index.php"><img src="assets/sh.png" style="width: 180px;"></a>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="jobsData.php">Jobs</a></li>
          <li><a class="nav-link scrollto" href="checklistjobsapp.php">Last Projects</a></li>
          <li class="ms-2"><a style="cursor:default;"><?php echo $_SESSION['fname'] ?></a></li>
          <li><a class="nav-link scrollto" href="applicantProfile.php">
            <img src="<?php echo $_SESSION['app_pic'] ?>" class="rounded-circle" style="width:40px;">
          </a></li>
          <li><a href="jobsData.php?logout=1" class="text-danger text-center" style="width:fit-content;">
            <i class="fa-solid fa-circle-right fs-5 me-2"></i> Logout
            <?php 
              if(isset($_GET['logout']) && $_GET['logout']==1){
                session_destroy();
                header('Location:index.php');
              }
            ?>
          </a></li>
      </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

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
          <button class="btn btn-dark w-25" type="submit" name="submit">Search</button>
        </form>
    </div>
      <!-- all jobs -->
      <div class="container mb-3 tabcontent" id="all">
        <div class="row">
          <?php
          if ($jobsData->num_rows) {
            foreach ($jobsData as $row) {
              // print_r($row);
              echo '<div class="col-md-4">';
              echo '<div class="card p-3 mb-2">';
              echo '<div class="d-flex justify-content-between">';
              echo '<div class="d-flex flex-row align-items-center">';
              // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
              if(($row['org_pic'])){
                echo "<div class='icon'>"."<img style='width:50px; height:50px;' class='rounded-circle' src='".$row['org_pic']."' >"."</div>";
              }
              echo '<div class="ms-2 c-details">';
              echo '<h6 class="mb-0">' . $row['org_name'] . '</h6> <small>' . $row['expire_date'] . '</small>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<div class="mt-3">';
              echo '<h4 class="heading">' . $row['job_title'] . '</h4>';
              echo '<p>' . $row['job_description'] . '</p>';
              echo '<p>' . $row['category'] . '</p>';
              echo '<small class="text-success">$' . $row['salary'] . '</small>';
              echo '<div class="mt-5">';
              echo '<a href="applyJob-send.php?job-id=' . $row['id_job'] . '" class="btn btn-primary w-100">Apply</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }

          ?>
        </div>


      </div>
      <!-- all jobs -->
      <!-- Data Science jobs -->
      <div class="container mb-3 tabcontent" id="1">
        <div class="row">
          <?php
          if (isset($DataScienceData->num_rows)) {
            foreach ($DataScienceData as $row) {
              // print_r($row);
              echo '<div class="col-md-4">';
              echo '<div class="card p-3 mb-2">';
              echo '<div class="d-flex justify-content-between">';
              echo '<div class="d-flex flex-row align-items-center">';
              // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
              if(($row['org_pic'])){
                echo "<div class='icon'>"."<img style='width:50px; height:50px;' class='rounded-circle' src='".$row['org_pic']."' >"."</div>";
              }
              echo '<div class="ms-2 c-details">';
              echo '<h6 class="mb-0">' . $row['org_name'] . '</h6> <small>' . $row['expire_date'] . '</small>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<div class="mt-3">';
              echo '<h4 class="heading">' . $row['job_title'] . '</h4>';
              echo '<p>' . $row['job_description'] . '</p>';
              echo '<p>' . $row['category'] . '</p>';
              echo '<small class="text-success">$' . $row['salary'] . '</small>';
              echo '<div class="mt-5">';
              echo '<a href="applyJob-send.php?job-id=' . $row['id_job'] . '" class="btn btn-primary w-100">Apply</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }
          ?>
        </div>


      </div>
      <!-- Data Science jobs -->
      <!-- Writing jobs -->
      <div class="container mb-3 tabcontent" id="2">
        <div class="row">
          <?php
          if ($WritingData->num_rows) {
            foreach ($WritingData as $row) {
              // print_r($row);
              echo '<div class="col-md-4">';
              echo '<div class="card p-3 mb-2">';
              echo '<div class="d-flex justify-content-between">';
              echo '<div class="d-flex flex-row align-items-center">';
              // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
              if(($row['org_pic'])){
                echo "<div class='icon'>"."<img style='width:50px; height:50px;' class='rounded-circle' src='".$row['org_pic']."' >"."</div>";
              }
              echo '<div class="ms-2 c-details">';
              echo '<h6 class="mb-0">' . $row['org_name'] . '</h6> <small>' . $row['expire_date'] . '</small>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<div class="mt-3">';
              echo '<h4 class="heading">' . $row['job_title'] . '</h4>';
              echo '<p>' . $row['job_description'] . '</p>';
              echo '<p>' . $row['category'] . '</p>';
              echo '<small class="text-success">$' . $row['salary'] . '</small>';
              echo '<div class="mt-5">';
              echo '<a href="applyJob-send.php?job-id=' . $row['id_job'] . '" class="btn btn-primary w-100">Apply</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }

          ?>
        </div>


      </div>
      <!-- Writing jobs -->
      <!-- Sales jobs -->
      <div class="container mb-3 tabcontent" id="3">
        <div class="row">
          <?php
          if ($SalesData->num_rows) {
            foreach ($SalesData as $row) {
              // print_r($row);
              echo '<div class="col-md-4">';
              echo '<div class="card p-3 mb-2">';
              echo '<div class="d-flex justify-content-between">';
              echo '<div class="d-flex flex-row align-items-center">';
              // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
              if(($row['org_pic'])){
                echo "<div class='icon'>"."<img style='width:50px; height:50px;' class='rounded-circle' src='".$row['org_pic']."' >"."</div>";
              }
              echo '<div class="ms-2 c-details">';
              echo '<h6 class="mb-0">' . $row['org_name'] . '</h6> <small>' . $row['expire_date'] . '</small>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<div class="mt-3">';
              echo '<h4 class="heading">' . $row['job_title'] . '</h4>';
              echo '<p>' . $row['job_description'] . '</p>';
              echo '<p>' . $row['category'] . '</p>';
              echo '<small class="text-success">$' . $row['salary'] . '</small>';
              echo '<div class="mt-5">';
              echo '<a href="applyJob-send.php?job-id=' . $row['id_job'] . '" class="btn btn-primary w-100">Apply</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }
          ?>
        </div>


      </div>
      <!-- Sales jobs -->
      <!-- Customer Support jobs -->
      <div class="container mb-3 tabcontent" id="4">
        <div class="row">
          <?php
          if ($CustomerSupportData->num_rows) {
            foreach ($CustomerSupportData as $row) {
              // print_r($row);
              echo '<div class="col-md-4">';
              echo '<div class="card p-3 mb-2">';
              echo '<div class="d-flex justify-content-between">';
              echo '<div class="d-flex flex-row align-items-center">';
              // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
              if(($row['org_pic'])){
                echo "<div class='icon'>"."<img style='width:50px; height:50px;' class='rounded-circle' src='".$row['org_pic']."' >"."</div>";
              }
              echo '<div class="ms-2 c-details">';
              echo '<h6 class="mb-0">' . $row['org_name'] . '</h6> <small>' . $row['expire_date'] . '</small>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<div class="mt-3">';
              echo '<h4 class="heading">' . $row['job_title'] . '</h4>';
              echo '<p>' . $row['job_description'] . '</p>';
              echo '<p>' . $row['category'] . '</p>';
              echo '<small class="text-success">$' . $row['salary'] . '</small>';
              echo '<div class="mt-5">';
              echo '<a href="applyJob-send.php?job-id=' . $row['id_job'] . '" class="btn btn-primary w-100">Apply</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }

          ?>
        </div>


      </div>
      <!-- Customer Support jobs -->
      <!-- Project Management jobs -->
      <div class="container mb-3 tabcontent" id="5">
        <div class="row">
          <?php
          if ($ProjectManagementData->num_rows) {
            foreach ($ProjectManagementData as $row) {
              // print_r($row);
              echo '<div class="col-md-4">';
              echo '<div class="card p-3 mb-2">';
              echo '<div class="d-flex justify-content-between">';
              echo '<div class="d-flex flex-row align-items-center">';
              // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
              if(($row['org_pic'])){
                echo "<div class='icon'>"."<img style='width:50px; height:50px;' class='rounded-circle' src='".$row['org_pic']."' >"."</div>";
              }
              echo '<div class="ms-2 c-details">';
              echo '<h6 class="mb-0">' . $row['org_name'] . '</h6> <small>' . $row['expire_date'] . '</small>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<div class="mt-3">';
              echo '<h4 class="heading">' . $row['job_title'] . '</h4>';
              echo '<p>' . $row['job_description'] . '</p>';
              echo '<p>' . $row['category'] . '</p>';
              echo '<small class="text-success">$' . $row['salary'] . '</small>';
              echo '<div class="mt-5">';
              echo '<a href="applyJob-send.php?job-id=' . $row['id_job'] . '" class="btn btn-primary w-100">Apply</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }

          ?>
        </div>


      </div>
      <!-- Project Management jobs -->
      <!-- Data Analysis jobs -->
      <div class="container mb-3 tabcontent" id="6">
        <div class="row">
          <?php
          if (($DataAnalysisData->num_rows)) {
            foreach ($DataAnalysisData as $row) {
              // print_r($row);
              echo '<div class="col-md-4">';
              echo '<div class="card p-3 mb-2">';
              echo '<div class="d-flex justify-content-between">';
              echo '<div class="d-flex flex-row align-items-center">';
              // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
              if(($row['org_pic'])){
                echo "<div class='icon'>"."<img style='width:50px; height:50px;' class='rounded-circle' src='".$row['org_pic']."' >"."</div>";
              }
              echo '<div class="ms-2 c-details">';
              echo '<h6 class="mb-0">' . $row['org_name'] . '</h6> <small>' . $row['expire_date'] . '</small>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '<div class="mt-3">';
              echo '<h4 class="heading">' . $row['job_title'] . '</h4>';
              echo '<p>' . $row['job_description'] . '</p>';
              echo '<p>' . $row['category'] . '</p>';
              echo '<small class="text-success">$' . $row['salary'] . '</small>';
              echo '<div class="mt-5">';
              echo '<a href="applyJob-send.php?job-id=' . $row['id_job'] . '" class="btn btn-primary w-100">Apply</a>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';
          }
          ?>

        </div>


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

</html>