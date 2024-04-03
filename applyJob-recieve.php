<?php
require_once "header.php";
?>

    <!-- navbar end-->
<?php
/////////////////////////////////////////////////////////////////
$id_job = $_REQUEST['job-id']  ;
//////////////////////////////////////////////////////////////
// var_dump($_REQUEST); //delete
// echo "<br><br><br>"; //delete
// var_dump($_FILES); //delete
// echo "<br><br><br>"; //delete

require_once "./inc/connection.php";
$id_app = $_SESSION['id_app'];
// phone
$phone_number = $_REQUEST['phone'];
$cv_value = $_FILES["cv"]["name"];
// var_dump($_FILES["cv"]["name"]); //delete
// echo "<br><br><br>"; //delete

// var_dump($cv_value != null); //delete
// echo "<br><br><br>"; //delete

//fill all form condtion and regex
if ($cv_value == null) {
    header("location:applyJob-send.php?job-id=$id_job&phone=$phone_number&cv_error=1");
}

$phone_number = $_REQUEST['phone'];
$pattern = "/^(010|012|015|011)\d{8}$/"; // Regex pattern 
if ($phone_number == null) {
    header("location:applyJob-send.php?job-id=$id_job&ph_error=1");
} elseif ($phone_number != null && preg_match($pattern, $phone_number)) {
    // echo "OooooooooooooooooooooooooooooooK"; //delete
    //relocation link

} else {
    header("location:applyJob-send.php?job-id=$id_job&phone=$phone_number&phone_error=1");

    // echo "Phone number is invalid."; //delete
}

//cv
// Check if the form is submitted
if (isset($_FILES["cv"])) {
    $uploadFile = 'cv/' . basename('cv' . $id_app . '.pdf');
    // echo "<br><br><br>"; //delete
    // echo "<br><br><br>"; //delete
    // var_dump($uploadFile);//delete
    // echo "<br><br><br>"; //delete


    // Check if file already exists and delete the old if exist
    if (file_exists($uploadFile)) {
        // echo "Sorry, file already exists.";
        unlink($uploadFile);
    }
    // Upload file
    move_uploaded_file($_FILES["cv"]["tmp_name"], $uploadFile);
}

///////////////////////////////////////////////////////////////////////////////////////////

// $id_app=$_SESSION[ 'id_app']; //repeting line
// echo "<br><br><br>"; //delete
// var_dump($id_app); //delete
// echo "<br><br><br>";  //delete
//********************************* */
// $id_job = $_REQUEST['job-id']  ;   // repeting line
//********************************* */                                                  
$app_status = 'a';
// $phone_number = $_REQUEST['phone']; repeting line
$cv_path = $uploadFile;
// var_dump($id_app); //delete
// echo "<br>"; //delete
// var_dump($id_job); //delete
// echo "<br>"; //delete
// var_dump($phone_number); //delete
// echo "<br>"; //delete
// var_dump($uploadFile); //delete
// echo "<br>"; //delete




// if ($cv_value != null && $phone_number != null && preg_match($pattern, $phone_number)) {
//     $data1 = $connection->query("
//     INSERT INTO job_app (id_app ,id_job,app_status,app_date,cv_path,phone)
//     VALUES ('$id_app','$id_job','$app_status',CURDATE(),'$cv_path','$phone_number')
//     ");

// echo"$data1";




// Assuming $id_app, $id_job, and $phone_number are already defined

// Check if the data is not null and phone number matches the pattern
if ($cv_value != null && $phone_number != null && preg_match($pattern, $phone_number)) {

    $checkQuery = "SELECT * FROM job_app WHERE id_app = '$id_app' AND id_job = '$id_job' ";
    $result = $connection->query($checkQuery);

    if ($result->num_rows > 0) {
        // If a record with the same key values already exists, show an error message
        // echo "Error: Duplicate entry. This application has already been submitted.";
  echo'  <div class="container text-center position-absolute top-50 start-50 translate-middle">
  
  <div class="alert alert-danger" role="alert">
  This application has already been submitted.
</div>
  
<a href="jobsData.php" type="button" class="btn btn-primary">Go Back</a>

  </div>';

    } else {
        // If no duplicate entry found, proceed with insertion
        $insertQuery = $connection->query("
        INSERT INTO job_app (id_app ,id_job,app_status,app_date,cv_path,phone)
        VALUES ('$id_app','$id_job','$app_status',CURDATE(),'$cv_path','$phone_number')
        ");
        header("Location: jobsData.php");
        
    }
} else {
    // Handle the case where input data is not valid
}
// header("Location: jobs.php");
// $data->fetch_assoc();
$connection->close();
echo "Check your last jobs or last projects";
// header("Location: jobs.php");
// header("location:jobsData.php")
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>




