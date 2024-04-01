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
  //execute SQL queries on the MySQL database
  $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result) > 0) {
    // getting the row of the target data
    $row = mysqli_fetch_assoc($result);

    $dataID = $row['id_org'];
    $dataOrgName = $row['org_name'];
    $dataDateOfest = $row['date_of_est'];
    $dataEmail = $row['email'];
    $dataPassword = $row['password'];
    $dataLocation = $row['location'];
    $datapic = $row['org_pic'];
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
  <title><?php echo $dataOrgName . " Profile"; ?></title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }



    .profile .container {
      padding-top: 30px;
      padding-bottom: 100px;
      margin-top: 50px;
      background-color: white
    }

    /* .user-image {
            di
            justify-content: center;
        } */

    .profile .user-image img {
      display: block;
      margin: 0 auto;
      width: 10%;
      border: 1px solid #9F78FF;
      border-radius: 50%;
    }

    .info {
      padding: 80px 0;
      width: 80%;
      margin: 0 auto;
    }

    .box-info {
      width: 90%;
      margin: 0 auto;
      display: flex;
      height: 70px;
      justify-content: center;
      align-items: center;


    }



    .box-info .key {
      width: 35%;


      text-align: center;
      align-self: center;
      padding: 20px 0;
      font-weight: bolder;
    }

    .box-info .value {
      width: 35%;
      text-align: center;
      background-color: #C5AEFF;
      padding: 13px;
      font-size: larger;
    }

    .
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand text-light fw-bold">SkillHive</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <!-- <a class="nav-link active" aria-current="page" href="">Home</a> -->
            <a class="nav-link text-light">Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light">Profile</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <div class="profile">
    <div class="container">
      <div class="user-image">
        <img src="<?php echo $datapic ?>" alt="">
      </div>
      <div class="user">
        <div class="info">
          <div class="box-info">
            <p class="key bg-primary">Name</p>
            <p id="name" class="value bg-body-secondary"><?php echo $dataOrgName ?></p>
          </div>

          <div class="box-info">
            <p class="key bg-primary">Email</p>
            <p id="email" class="value bg-body-secondary"><?php echo $dataEmail ?></p>
          </div>
          <div class="box-info">
            <p class="key bg-primary">Date Of Establish</p>
            <p id="tel" class="value bg-body-secondary"><?php echo $dataDateOfest ?></p>
          </div>

          <div class="box-info">
            <p class="key bg-primary">Location</p>
            <p id="tel" class="value bg-body-secondary"><?php echo $dataLocation ?></p>
          </div>

        </div>

      </div>
    </div>
  </div>


</body>

</html>