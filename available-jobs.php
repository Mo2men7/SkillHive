<?php

require("./inc/connection.php");
$jobsData = $connection->query("select * from jobs join organization");
// foreach ($jobsData as $row) {
//     echo $row['id_job']." ".$row['job_title']." ".$row['job_description']." ".$row['org_id']." ".$row['publish_date']." ".$row['expire_date']." ".$row['job_status']." ";
//     echo "<br>";
// }
// echo "<br><br>";
$categoryData = $connection->query("select * from category");
// foreach ($categoryData as $row) {
//     echo $row['id_category']." ".$row['category']." ";
//     echo "<br>";
// }
// $category = 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="available-jobs.css">
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</head>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Cairo:wght@300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");
  * {
    font-family: "Poppins", sans-serif;
  }
  .tab{
    cursor: pointer;
    transition: 0.5s ease;
    padding: 10px 0;
    width:100%;
    border-top-left-radius: 50px;
    border-bottom-left-radius: 50px;
    padding-top: 13px;
    padding-bottom: 13px;
    padding-left:5px;
    padding-right:0px;
    border:none;
    outline:none;
    background:white;
  }
  .tab:hover{
    background-color: dodgerblue;
    color: white;
    background: #eee;
    color:black;
  }
  .tab.active{
    /* color: white; */
    background:#eee;
  }
  .sidebar {
    padding: 20px 0px;
}
</style>
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
      <button class="tab tablinks" onclick="openCity(event, 'all')" id="defaultOpen">All</button>
        <?php
          foreach ($categoryData as $row) {
            echo '<button class="tab tablinks" onclick="openCity(event, "'.$row['category'].'")">'.$row["category"].'</button>';
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
                    foreach($jobsData as $row){
                      // print_r($row);
                        echo '<div class="col-md-4">';
                        echo '<div class="card p-3 mb-2">';
                        echo '<div class="d-flex justify-content-between">';
                        echo '<div class="d-flex flex-row align-items-center">';
                        // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                        echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';
                        echo '<div class="ms-2 c-details">';
                                echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="mt-3">';
                        echo '<h4 class="heading">'.$row['job_description'].'</h4>';
                        echo '<p>'.$row['job_title'].'</p>';
                        echo '<small class="text-success">$'.$row['salary'].'</small>';
                        echo '<div class="mt-5">';
                        echo '<a class="btn btn-success w-100">Apply</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                    ?>
        </div>


    </div>
    <!-- all jobs -->
    <!-- Data Science jobs -->
    <div class="container mb-3 tabcontent" id="Data Science">
        <div class="row">
            <?php
                    foreach($jobsData as $row){
                      // print_r($row);
                        echo '<div class="col-md-4">';
                        echo '<div class="card p-3 mb-2">';
                        echo '<div class="d-flex justify-content-between">';
                        echo '<div class="d-flex flex-row align-items-center">';
                        // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                        echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';
                        echo '<div class="ms-2 c-details">';
                                echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="mt-3">';
                        echo '<h4 class="heading">'.$row['job_description'].'</h4>';
                        echo '<p>'.$row['job_title'].'</p>';
                        echo '<small class="text-success">$'.$row['salary'].'</small>';
                        echo '<div class="mt-5">';
                        echo '<a class="btn btn-success w-100">Apply</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                    ?>
        </div>


    </div>
    <!-- Data Science jobs -->
    <!-- Writing jobs -->
    <div class="container mb-3 tabcontent" id="Writing">
        <div class="row">
            <?php
                    foreach($jobsData as $row){
                      // print_r($row);
                        echo '<div class="col-md-4">';
                        echo '<div class="card p-3 mb-2">';
                        echo '<div class="d-flex justify-content-between">';
                        echo '<div class="d-flex flex-row align-items-center">';
                        // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                        echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';
                        echo '<div class="ms-2 c-details">';
                                echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="mt-3">';
                        echo '<h4 class="heading">'.$row['job_description'].'</h4>';
                        echo '<p>'.$row['job_title'].'</p>';
                        echo '<small class="text-success">$'.$row['salary'].'</small>';
                        echo '<div class="mt-5">';
                        echo '<a class="btn btn-success w-100">Apply</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                    ?>
        </div>


    </div>
    <!-- Writing jobs -->
    <!-- Sales jobs -->
    <div class="container mb-3 tabcontent" id="Sales">
        <div class="row">
            <?php
                    foreach($jobsData as $row){
                      // print_r($row);
                        echo '<div class="col-md-4">';
                        echo '<div class="card p-3 mb-2">';
                        echo '<div class="d-flex justify-content-between">';
                        echo '<div class="d-flex flex-row align-items-center">';
                        // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                        echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';
                        echo '<div class="ms-2 c-details">';
                                echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="mt-3">';
                        echo '<h4 class="heading">'.$row['job_description'].'</h4>';
                        echo '<p>'.$row['job_title'].'</p>';
                        echo '<small class="text-success">$'.$row['salary'].'</small>';
                        echo '<div class="mt-5">';
                        echo '<a class="btn btn-success w-100">Apply</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                    ?>
        </div>


    </div>
    <!-- Sales jobs -->
    <!-- Customer Support jobs -->
    <div class="container mb-3 tabcontent" id="Customer Support">
        <div class="row">
            <?php
                    foreach($jobsData as $row){
                      // print_r($row);
                        echo '<div class="col-md-4">';
                        echo '<div class="card p-3 mb-2">';
                        echo '<div class="d-flex justify-content-between">';
                        echo '<div class="d-flex flex-row align-items-center">';
                        // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                        echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';
                        echo '<div class="ms-2 c-details">';
                                echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="mt-3">';
                        echo '<h4 class="heading">'.$row['job_description'].'</h4>';
                        echo '<p>'.$row['job_title'].'</p>';
                        echo '<small class="text-success">$'.$row['salary'].'</small>';
                        echo '<div class="mt-5">';
                        echo '<a class="btn btn-success w-100">Apply</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                    ?>
        </div>


    </div>
    <!-- Customer Support jobs -->
    <!-- Project Management jobs -->
    <div class="container mb-3 tabcontent" id="Project Management">
        <div class="row">
            <?php
                    foreach($jobsData as $row){
                      // print_r($row);
                        echo '<div class="col-md-4">';
                        echo '<div class="card p-3 mb-2">';
                        echo '<div class="d-flex justify-content-between">';
                        echo '<div class="d-flex flex-row align-items-center">';
                        // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                        echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';
                        echo '<div class="ms-2 c-details">';
                                echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="mt-3">';
                        echo '<h4 class="heading">'.$row['job_description'].'</h4>';
                        echo '<p>'.$row['job_title'].'</p>';
                        echo '<small class="text-success">$'.$row['salary'].'</small>';
                        echo '<div class="mt-5">';
                        echo '<a class="btn btn-success w-100">Apply</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    }
                    ?>
        </div>


    </div>
    <!-- Project Management jobs -->
    <!-- Data Analysis jobs -->
    <div class="container mb-3 tabcontent" id="Data Analysis">
        <div class="row">
            <?php
                    foreach($jobsData as $row){
                      // print_r($row);
                        echo '<div class="col-md-4">';
                        echo '<div class="card p-3 mb-2">';
                        echo '<div class="d-flex justify-content-between">';
                        echo '<div class="d-flex flex-row align-items-center">';
                        // echo '<div class="icon"> <i class="fa-brands fa-mailchimp"></i> </div>';
                        echo '<div class="icon">'.'<img src="'.'org_pic/'.$row['org_pic'].'" >'.'</div>';
                        echo '<div class="ms-2 c-details">';
                                echo '<h6 class="mb-0">'.$row['org_name'].'</h6> <small>'.$row['expire_date'].'</small>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="mt-3">';
                        echo '<h4 class="heading">'.$row['job_description'].'</h4>';
                        echo '<p>'.$row['job_title'].'</p>';
                        echo '<small class="text-success">$'.$row['salary'].'</small>';
                        echo '<div class="mt-5">';
                        echo '<a class="btn btn-success w-100">Apply</a>';
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
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
  function openCity(evt, category) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
      console.log(category)
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
      console.log(category)
    }
    document.getElementById(category).style.display = "block";
    evt.currentTarget.className += " active";
  }
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
</script>
</html>