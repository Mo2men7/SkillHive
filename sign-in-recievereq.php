<?php
session_start();
$connection = new mysqli("localhost", "root", "123y", "job_portal");
if ($connection->connect_errno) {
    die("error in database connection");
}
var_dump($_REQUEST);
echo "<br>";
// Retrieve email and password from the request
$g_email = $_REQUEST['email'];
$g_password = $_REQUEST['password'];

var_dump($g_email);
echo "<br>";
var_dump($g_password);
echo "<br>";
//$password =password_hash($_REQUEST['pass']) ;
// Fetch all records from the user_data table
$data = $connection->query("SELECT * FROM organization where email='$g_email'");

//$data = $connection->query("SELECT * FROM user_data where email=$email");
//
$result=$data->fetch_assoc();
var_dump($data->fetch_assoc());
var_dump($result);
// Check if there are any records
// if ($data->num_rows > 0) {
    // Loop through each row
    //password_verify(formoass,hashpass)
    // while ($row = $data->fetch_assoc()) {
        // Compare email and password with each row
        // if ($row['email'] === $email && $row['password'] === $password)
        if ($g_password==$result['password']) {
            // If email and password match, authentication successful
            // echo "Authentication successful!";
            // $_SESSION["username"] = $email;
            // $_SESSION["password"] = $password;
            // You may perform further actions (e.g., redirect the user)

            header("location:profile.php?email=$g_email");
             // Exit the loop since authentication is successful
          //  header("location:profile.php?$email"); // Exit the loop since authentication is successful
        }
    // }
    // If the loop completes without finding a match, authentication failed
    // echo "Authentication failed. Invalid email or password.";
// }
 else {
    header("location:signin.php?email=$g_email&error=1");
}
$connection->close();
?>
