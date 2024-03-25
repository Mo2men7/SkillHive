<?php

$file = file("users.txt");
$userName;
$userPic;
if(isset($_POST["email"]) && isset($_POST["password"])) {
    foreach($file as $line) {
    $lineData = explode(" ", $line);
    if(!($lineData[2] === $_POST["email"] && ($lineData[3]) === $_POST["password"])) {
        header("Location: signin.php?login=false");
    }
    $userName = $lineData[0]." ".$lineData[1];
    $userPic = $lineData[sizeof($lineData)-1];
}
// exit(); // Exit to prevent further execution
}
else{
    header("Location:signin.php");
}

session_start();
$_SESSION["name"] = $userName;
$_SESSION["pic"] = $userPic;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=Cairo:wght@300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");
    * {
      font-family: "Poppins", sans-serif;
    }
    hr{
        width: 70%;
        height: 3px;
    }
</style>
<body class="d-flex justify-content-center align-items-center gap-2 flex-column bg-dark" style="height:100vh;">
    <hr class="bg-success">
    <h1 class="text-light">
        <?php echo "Welcome Back, <span class='text-success bg-light'>{$_SESSION['name']}</span>"; ?>
    </h1>
    <img class="rounded-circle" src='<?php echo"{$_SESSION['pic']}" ?>' style="width:200px;">
    <hr class="bg-success">
    <a href="signin.php"  class="btn btn-danger px-3 py-2 mt-4" style="width: 150px;">Logout</a>
</body>
</html>