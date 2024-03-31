<?php
$id=4;
var_dump($_REQUEST);
echo"<br><br><br>";
var_dump($_FILES);
echo"<br><br><br>";
session_start();
$connection = new mysqli("localhost", "root", "123y", "job_portal");
if ($connection->connect_errno) {
    die("error in database connection");
}
// phone
// SQL query to update the phone column
// $phone_REGEXP ='^(010|012|015)\d{8}$';
// $phone = $_REQUEST['phone'];
// if (preg_match($phone_REGEXP, $phone)) {
//     echo "OK";
// } else {
//     echo "Phone number is invalid.";
// }
// if (!isset($_REQUEST["phone"])){
//     header("location:applyJob-send.php?&ph_error=1");
// }

$phone_number = $_REQUEST['phone'];
$cv_value=$_FILES["cv"]["name"];
var_dump($_FILES["cv"]["name"]);
echo"<br><br><br>";

var_dump($cv_value!=null);
echo"<br><br><br>";

//fill all form condtion and regex
if ($cv_value==null){
    header("location:applyJob-send.php?phone=$phone_number&cv_error=1");
}

$phone_number = $_REQUEST['phone']; // Example phone number
$pattern = "/^(010|012|015|011)\d{8}$/"; // Regex pattern with delimiters
if ($phone_number==null){
    header("location:applyJob-send.php?&ph_error=1");
}

elseif ($phone_number!=null && preg_match($pattern, $phone_number)) {
    echo "OooooooooooooooooooooooooooooooK";
} 

else{
    header("location:applyJob-send.php?phone=$phone_number&phone_error=1");

    // echo "Phone number is invalid.";
}





//cv
// Check if the form is submitted
if ( isset($_FILES["cv"])) {
    // $uploadDir = "cv/";
    $uploadFile = 'cv/' . basename('cv'.$id.'.pdf');

    var_dump($uploadFile );
    // $uploadOk = true;
    // $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));

    // Check if file already exists and delete the old if exist
    if (file_exists($uploadFile)) {
        // echo "Sorry, file already exists.";
        unlink($uploadFile);
    }
     // Upload file
    move_uploaded_file($_FILES["cv"]["tmp_name"], $uploadFile);

        // // // Upload file
        // if (move_uploaded_file($_FILES["cv"]["tmp_name"], $uploadFile)) {
        //     echo "The file " . 
        //     basename('cv'.$id.'.pdf') 
        //     . " has been uploaded.";
        // } 
}
// var_dump($fileType)
///////////////////////////////////////////////////////////////////////////////////////////
$id_app=1;
$id_job=2;
$app_status='a';
// $phone_number = $_REQUEST['phone']; repeting line
$cv_path=$uploadFile;
var_dump($id_app);
echo "<br>";
var_dump($id_job);
echo "<br>";
var_dump($phone_number);
echo "<br>";
var_dump($uploadFile);
echo "<br>";

$data1 = $connection->query("
INSERT INTO job_app (id_app ,id_job,app_status,app_date,cv_path,phone)
VALUES ('$id_app','$id_job','$app_status',CURDATE(),'$cv_path','$phone_number')
");

// $data->fetch_assoc();
$connection->close();





?>