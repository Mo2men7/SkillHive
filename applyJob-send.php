<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for a job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    require_once "./inc/connection.php";
    $data = $connection->query("SELECT * FROM applicant where id_app='1'");
    $user_info = $data->fetch_assoc();
    var_dump($user_info);
    echo"<br><br><br>";
    var_dump($_REQUEST);
    echo"<br><br><br>";
    ?>


    <!-- contact info   start-->
    <div class="container">
        <br><br>
        <div class="bg-light container p-3 border border-warning">
            <h1 class=" text-warning">contact info</h1>
            <!-- contact info  end-->
            <?php echo $user_info['fname'] . " " . $user_info['lname']; ?>
            <br>
            <?php echo $user_info['country']; ?>
            <br><br>
            <!-- form  start -->
            <!-- /********************************* */  -->
            <?php $jobid=$_REQUEST['job-id']; ?>
            <form action="applyJob-recieve.php?job-id=<?php echo $_REQUEST['job-id']; ?>" method="post" enctype="multipart/form-data">
    <!-- /********************************* */  -->
            <!-- Form fields go here -->
                <!-- name -->
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control " name="name" value="<?php echo $user_info['fname'] . " " . $user_info['lname']; ?>" readonly>
                </div>
                <br>
                <!-- email -->
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control " name="email" value="<?php echo $user_info['email']; ?>" readonly>
                </div>
                <br>
                <!-- phone -->
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="tel" class="form-control " name="phone" placeholder="Type your number ex:01011223344" 
                    <?php
                     if (isset($_REQUEST["phone"])) {
                     echo"  value='$_REQUEST[phone]' ";
                    }

                                                                                                        ?>>
                </div>
                <?php
                if (isset($_REQUEST["phone_error"])) {
                    echo " <small class ='text-danger'> 
                           Phone number is invalid.
                       </small>";
                }
                if (isset($_REQUEST["ph_error"])) {
                    echo " <small class ='text-danger'> 
                   please type you phone number.
                     </small>";
                 }
                
                ?>
                <br>
                <!-- resume -->
                <div class="form-group">
                    <label for="cv">Upload resume</label>
                    <input type="file" class="form-control" name="cv" accept=".pdf">
                    <?php
                if (isset($_REQUEST["cv_error"])) {
                    echo " <small class ='text-danger'> 
                    You haven't uploaded a CV-
                    </small>";
                }
                ?>
                    <small class="text-danger">accept .pdf only</small>
                </div>
                
                <br>
                <!-- date -->
                <div class="form-group">
                    <label for="">date</label>
                    <input class="form-control" type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>
                <br>
        </div>

        <br>
        <button type="submit" class="btn btn-warning">Apply Job</button>
        <?php
        // Close the PHP block
        $connection->close();
        // header("location:profile.php?id=1");
        ?>
    </div>
    </form>
    </div>
    <!-- sign in  form end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>