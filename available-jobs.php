<?php

require("./inc/connection.php");
$jobsData = $connection->query("select jobs.*,category.category,organization.org_name from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id;");
$DataScienceData = $connection->query("select jobs.*,category.category,organization.org_name from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id where category = 'Data Science';");
$WritingData = $connection->query("select jobs.*,category.category,organization.org_name from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id where category = 'Writing';");
$SalesData = $connection->query("select jobs.*,category.category,organization.org_name from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id where category = 'Sales';");
$CustomerSupportData = $connection->query("select jobs.*,category.category,organization.org_name from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id where category = 'Customer Support';");
$ProjectManagementData = $connection->query("select jobs.*,category.category,organization.org_name from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id where category = 'Project Management';");
$DataAnalysisData = $connection->query("select jobs.*,category.category,organization.org_name from jobs inner join category on jobs.id_category= category.id_category inner join organization on organization.id_org=jobs.org_id where category = 'Data Analysis';");
$categoryData = $connection->query("select * from category");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    <link rel="stylesheet" href="available.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/all.min.css">
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand text-light fw-bold">SkillHive</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
          <a class="nav-link text-light">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light">Profile</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
  <!-- Navbar -->
  <div class="row h-100 w-100">
    <!-- Sidebar -->
    <sidebar id="sidebarMenu" class="sidebar bg-white col-md-2 d-flex flex-column gap-3 pt-5 ps-4">
      <button class="tab tablinks" onclick="openTab(event, 'all')" id="defaultOpen">All</button>
        <?php
          foreach ($categoryData as $row) {
            echo '<button class="tab tablinks" onclick="openTab(event, '.$row['id_category'].')">'.$row["category"].'</button>';
          }
        ?>
    </sidebar>
    <!-- Sidebar -->
    <!--Main layout-->
    <main style="margin-top: 40px;" class="tabContent col-md-10">
    
    <!-- all jobs -->
    <div class="container mb-3 tabcontent" id="all">
        <div class="row">
            <?php
            if($jobsData->num_rows){
                    foreach($jobsData as $row){
                      // print_r($row);
                        echo '<div class="col-md-4">';
                        echo '<div class="card p-3 mb-2">';
                        echo '<div class="d-flex justify-content-between">';
                        echo '<div class="d-flex flex-row align-items-center">';
                        // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                        if(isset($row['org_pic'])){echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';}
                        echo '<div class="ms-2 c-details">';
                                echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="mt-3">';
                        echo '<h4 class="heading">'.$row['job_title'].'</h4>';
                        echo '<p>'.$row['job_description'].'</p>';
                        echo '<p>'.$row['category'].'</p>';
                        echo '<small class="text-success">$'.$row['salary'].'</small>';
                        echo '<div class="mt-5">';
                        echo '<a class="btn btn-success w-100">Apply</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                  }
            else{echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';}

                    ?>
        </div>


    </div>
    <!-- all jobs -->
    <!-- Data Science jobs -->
    <div class="container mb-3 tabcontent" id="1">
        <div class="row">
            <?php
            if(isset($DataScienceData->num_rows)){
              foreach($DataScienceData as $row){
                // print_r($row);
                  echo '<div class="col-md-4">';
                  echo '<div class="card p-3 mb-2">';
                  echo '<div class="d-flex justify-content-between">';
                  echo '<div class="d-flex flex-row align-items-center">';
                  // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                  if(isset($row['org_pic'])){echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';}
                  echo '<div class="ms-2 c-details">';
                          echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                      echo '</div>';
                  echo '</div>';
              echo '</div>';
              echo '<div class="mt-3">';
                  echo '<h4 class="heading">'.$row['job_title'].'</h4>';
                  echo '<p>'.$row['job_description'].'</p>';
                  echo '<p>'.$row['category'].'</p>';
                  echo '<small class="text-success">$'.$row['salary'].'</small>';
                  echo '<div class="mt-5">';
                  echo '<a class="btn btn-success w-100" href="#">Apply</a>';
                  echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              }
            }
            else{echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';}
                    ?>
        </div>


    </div>
    <!-- Data Science jobs -->
    <!-- Writing jobs -->
    <div class="container mb-3 tabcontent" id="2">
        <div class="row">
            <?php
            if($WritingData->num_rows){
                    foreach($WritingData as $row){
                      // print_r($row);
                        echo '<div class="col-md-4">';
                        echo '<div class="card p-3 mb-2">';
                        echo '<div class="d-flex justify-content-between">';
                        echo '<div class="d-flex flex-row align-items-center">';
                        // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                        if(isset($row['org_pic'])){echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';}
                        echo '<div class="ms-2 c-details">';
                                echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="mt-3">';
                        echo '<h4 class="heading">'.$row['job_title'].'</h4>';
                        echo '<p>'.$row['job_description'].'</p>';
                        echo '<p>'.$row['category'].'</p>';
                        echo '<small class="text-success">$'.$row['salary'].'</small>';
                        echo '<div class="mt-5">';
                        echo '<a class="btn btn-success w-100">Apply</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                  }
            else{echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';}

                    ?>
        </div>


    </div>
    <!-- Writing jobs -->
    <!-- Sales jobs -->
    <div class="container mb-3 tabcontent" id="3">
        <div class="row">
            <?php
            if($SalesData->num_rows){
                    foreach($SalesData as $row){
                      // print_r($row);
                        echo '<div class="col-md-4">';
                        echo '<div class="card p-3 mb-2">';
                        echo '<div class="d-flex justify-content-between">';
                        echo '<div class="d-flex flex-row align-items-center">';
                        // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                        if(isset($row['org_pic'])){echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';}
                        echo '<div class="ms-2 c-details">';
                                echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="mt-3">';
                        echo '<h4 class="heading">'.$row['job_title'].'</h4>';
                        echo '<p>'.$row['job_description'].'</p>';
                        echo '<p>'.$row['category'].'</p>';
                        echo '<small class="text-success">$'.$row['salary'].'</small>';
                        echo '<div class="mt-5">';
                        echo '<a class="btn btn-success w-100">Apply</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                  }
            else{echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';}
                    ?>
        </div>


    </div>
    <!-- Sales jobs -->
    <!-- Customer Support jobs -->
    <div class="container mb-3 tabcontent" id="4">
        <div class="row">
            <?php
            if($CustomerSupportData->num_rows){
                    foreach($CustomerSupportData as $row){
                      // print_r($row);
                        echo '<div class="col-md-4">';
                        echo '<div class="card p-3 mb-2">';
                        echo '<div class="d-flex justify-content-between">';
                        echo '<div class="d-flex flex-row align-items-center">';
                        // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                        if(isset($row['org_pic'])){echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';}
                        echo '<div class="ms-2 c-details">';
                                echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="mt-3">';
                        echo '<h4 class="heading">'.$row['job_title'].'</h4>';
                        echo '<p>'.$row['job_description'].'</p>';
                        echo '<p>'.$row['category'].'</p>';
                        echo '<small class="text-success">$'.$row['salary'].'</small>';
                        echo '<div class="mt-5">';
                        echo '<a class="btn btn-success w-100">Apply</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                  }
            else{echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';}

                    ?>
        </div>


    </div>
    <!-- Customer Support jobs -->
    <!-- Project Management jobs -->
    <div class="container mb-3 tabcontent" id="5">
        <div class="row">
            <?php
            if($ProjectManagementData->num_rows){
                    foreach($ProjectManagementData as $row){
                      // print_r($row);
                        echo '<div class="col-md-4">';
                        echo '<div class="card p-3 mb-2">';
                        echo '<div class="d-flex justify-content-between">';
                        echo '<div class="d-flex flex-row align-items-center">';
                        // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                        if(isset($row['org_pic'])){echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';}
                        echo '<div class="ms-2 c-details">';
                                echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="mt-3">';
                        echo '<h4 class="heading">'.$row['job_title'].'</h4>';
                        echo '<p>'.$row['job_description'].'</p>';
                        echo '<p>'.$row['category'].'</p>';
                        echo '<small class="text-success">$'.$row['salary'].'</small>';
                        echo '<div class="mt-5">';
                        echo '<a class="btn btn-success w-100">Apply</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                  }
            else{echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';}

                    ?>
        </div>


    </div>
    <!-- Project Management jobs -->
    <!-- Data Analysis jobs -->
    <div class="container mb-3 tabcontent" id="6">
        <div class="row">
            <?php
            if(($DataAnalysisData->num_rows)){
              foreach($DataAnalysisData as $row){
                // print_r($row);
                  echo '<div class="col-md-4">';
                  echo '<div class="card p-3 mb-2">';
                  echo '<div class="d-flex justify-content-between">';
                  echo '<div class="d-flex flex-row align-items-center">';
                  // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                  if(isset($row['org_pic'])){echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';}
                  echo '<div class="ms-2 c-details">';
                          echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                      echo '</div>';
                  echo '</div>';
              echo '</div>';
              echo '<div class="mt-3">';
                  echo '<h4 class="heading">'.$row['job_title'].'</h4>';
                  echo '<p>'.$row['job_description'].'</p>';
                  echo '<p>'.$row['category'].'</p>';
                  echo '<small class="text-success">$'.$row['salary'].'</small>';
                  echo '<div class="mt-5">';
                  echo '<a class="btn btn-success w-100">Apply</a>';
                  echo '</div>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
              }
            }
            else{echo '<h3 class="text-center mt-3">Nothing here .. yet</h3>';}
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