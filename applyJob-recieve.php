<?php
var_dump($_REQUEST); //delete
echo "<br><br><br>"; //delete
var_dump($_FILES); //delete
echo "<br><br><br>"; //delete
session_start();
require_once "./inc/connection.php";
$id_app = $_SESSION['id_app'];
// phone
$phone_number = $_REQUEST['phone'];
$cv_value = $_FILES["cv"]["name"];
var_dump($_FILES["cv"]["name"]); //delete
echo "<br><br><br>"; //delete

var_dump($cv_value != null); //delete
echo "<br><br><br>"; //delete

//fill all form condtion and regex
if ($cv_value == null) {
    header("location:applyJob-send.php?phone=$phone_number&cv_error=1");
}

$phone_number = $_REQUEST['phone'];
$pattern = "/^(010|012|015|011)\d{8}$/"; // Regex pattern 
if ($phone_number == null) {
    header("location:applyJob-send.php?&ph_error=1");
} elseif ($phone_number != null && preg_match($pattern, $phone_number)) {
    echo "OooooooooooooooooooooooooooooooK"; //delete
    //relocation link

} else {
    header("location:applyJob-send.php?phone=$phone_number&phone_error=1");

    // echo "Phone number is invalid."; //delete
}

//cv
// Check if the form is submitted
if (isset($_FILES["cv"])) {
    $uploadFile = 'cv/' . basename('cv' . $id_app . '.pdf');
    echo "<br><br><br>"; //delete
    echo "<br><br><br>"; //delete
    var_dump($uploadFile);
    echo "<br><br><br>"; //delete


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
echo "<br><br><br>"; //delete
var_dump($id_app); //delete
echo "<br><br><br>";  //delete
$id_job = 4;                                                        //need to change
$app_status = 'a';
// $phone_number = $_REQUEST['phone']; repeting line
$cv_path = $uploadFile;
var_dump($id_app); //delete
echo "<br>"; //delete
var_dump($id_job); //delete
echo "<br>"; //delete
var_dump($phone_number); //delete
echo "<br>"; //delete
var_dump($uploadFile); //delete
echo "<br>"; //delete



if ($cv_value != null && $phone_number != null && preg_match($pattern, $phone_number)) {
    $data1 = $connection->query("
    INSERT INTO job_app (id_app ,id_job,app_status,app_date,cv_path,phone)
    VALUES ('$id_app','$id_job','$app_status',CURDATE(),'$cv_path','$phone_number')
    ");



     //relocation link
    //  header("location:.php");
    echo "relocation";
};


// $data->fetch_assoc();
$connection->close();
