<?php
require_once "header.php";
?>

    <style>
        .bg_title {
            background: linear-gradient(90deg, rgba(0, 116, 255, 1) 0%, rgba(33, 216, 255, 1) 100%);
        }

        .main {
            width: 60%;
        }

        .info {
            font-size: larger;
            color: gray;
            font-weight: 500;
        }
    </style>
    <?php

    $appid=$_SESSION['id_app'];
    $jobid = $_REQUEST['job-id'];
    $data1 = $connection->query("SELECT * FROM applicant where id_app='$appid'");
    $user_info = $data1->fetch_assoc();
    $data2 = $connection->query("SELECT * FROM jobs where id_job='$jobid'");
    $job_info = $data2->fetch_assoc();
    $orgid = $job_info['org_id'];
    // var_dump($orgid);
    $data3 = $connection->query("SELECT * FROM organization where id_org='$orgid'");
    $org_info = $data3->fetch_assoc();
    // var_dump($org_info);
    // var_dump($job_info);
    // var_dump($user_info);
    // echo "<br><br><br>";
    // var_dump($_REQUEST);
    // echo "<br><br><br>";

    ?>


    <!-- contact info   start-->
    <div class="container main mt-5 pt-5">

        <div class=" border mt-6">
            <h1 class="text-white text-center bg_title p-4">Confirm Data</h1>
            <div class="p-4">
                <?php
                echo '<h2 >Apply to ' . $job_info['job_title'] . ' at ' . $org_info['org_name'] . '</h2>';
                echo '<div class="info">' . $job_info['job_description']  . '</div>';
                echo '<div class="info">salary:' . $job_info['salary']  . '$</div>';
                echo '<div class="info">Apply before:' . $job_info['expire_date']  . '.</div>';
                ?>
            </div>
            <!-- form  start -->
            <!-- /********************************* */  -->

            <div class="p-4">
                <form action="applyJob-recieve.php?job-id=<?php echo $_REQUEST['job-id']; ?>" method="post" enctype="multipart/form-data">
                    <!-- /********************************* */  -->
                    <!-- Form fields go here -->
                    <!-- name -->
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control rounded shadow py-2" name="name" value="<?php echo $user_info['fname'] . " " . $user_info['lname']; ?>" readonly >
                    </div>
                    <br>
                    <!-- email -->
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control rounded shadow py-2" name="email" value="<?php echo $user_info['email']; ?>" readonly>
                    </div>
                    <br>
                    <!-- phone -->
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="tel" class="form-control rounded shadow py-2" name="phone" placeholder="Type your number ex:01011223344"
                         <?php
                        if (isset($_REQUEST["phone"])) {
                            echo "  value='$_REQUEST[phone]' ";
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
                        <input type="file" class="form-control rounded shadow py-2" name="cv" accept=".pdf">
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
                        <input class="form-control rounded shadow" type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                    </div>
            </div>
            <div class="text-center"><button type="submit" class="btn text-light bg_title my-3 fw-bold">Apply Job</button></div>

            <?php
            // Close the PHP block
            $connection->close();
            // header("location:profile.php?id=1");
            ?>
        </div>
        </form>
    </div>

    </div>
    <!-- sign in  form end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>