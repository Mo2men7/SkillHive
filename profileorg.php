<?php
require("inc/connection.php");

$u = "info@marketingpro.com";
$p = "market456";

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
</head>

<body>
  <section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <h5 class="my-3"><?php echo $dataOrgName  ?></h5>
              <p class="text-muted mb-1"><?php echo $dataOrgName ?></p>
              <p class="text-muted mb-4"><?php echo $dataLocation ?></p>
              <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-primary">Follow</button>
                <button type="button" class="btn btn-outline-primary ms-1">Message</button>
              </div>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $dataOrgName ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $dataEmail ?></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?php echo $dataLocation ?></p>
                  </div>
                </div>
                <hr>

                <hr>


              </div>
            </div>
          </div>
  </section>
</body>

</html>