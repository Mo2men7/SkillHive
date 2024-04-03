<?php


require("./inc/connection.php");
print_r($_POST);

if ($_POST['gender'] == "male") {
    $_POST['gender'] = "m";
} else if ($_POST['gender'] == "female") {
    $_POST['gender'] = "f";
};

$connection->query("insert into applicant (fname, lname, user_name, date_of_birth, gender, email, password, country,address,job_title,phone)
    values ('{$_POST['firstname']}',
            '{$_POST['lastname']}',
            '{$_POST['username']}',
            '{$_POST['date']}',
            '{$_POST['gender']}',
            '{$_POST['email']}',
            '{$_POST['password']}',
            '{$_POST['country']}',
            '{$_POST['address']}',
            '{$_POST['job_title']}',
            '{$_POST['phone']}')

        ");
$target_dir = "app_pic/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$imgname =  $connection->insert_id . "." . $imageFileType;
move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $imgname);
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists

if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $imgname)) {
        echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$imgname = "./app_pic/" . $connection->insert_id . "." . $imageFileType;
$lastid = $connection->insert_id;
$stm = $connection->prepare("UPDATE applicant
        SET app_pic = ?
        WHERE id_app=?;");
$stm->bind_param(
    'si',
    $imgname,
    $lastid
);
$stm->execute();
$connection->close();

// $new_date = date('y-m-d', strtotime($_POST['date']));

header("Location:sign-in-sendreqapp.php")

?>

<!-- var_dump($_POST); -->