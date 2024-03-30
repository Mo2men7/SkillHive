<?php
require_once "header.php";
require_once "inc/function.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <?php

        foreach ($_SESSION["jobs"] as $value) {
            // echo "<pre>";

            // print_r($value);
            // echo "</pre>";
            // echo "<div class='card my-5'>";
            if ($value["job_status"] == "c")
            {
                $colorOnStatus = "danger";
                $jobStatus="Closed";
            }else
            {
                $colorOnStatus = "success";
                $jobStatus="Opened";
            }


            echo "<div class='card border-" . $colorOnStatus . " mb-3 my-4 '>
            <div class='card-header d-flex justify-content-between align-items-baseline'>
            <div class='d-flex  align-items-center'>
            <span class='fw-bold fs-4'>" . $value["job_title"] . "</span>
            
            <span class='badge text-bg-" . $colorOnStatus . " fs-7 ms-2'>".$jobStatus."</span>
            
            </div>
            <div  class='text-body-secondary fs-20'>Published on " . $value["publish_date"] . "</div>
            </div>
            <div class='card-body'>
            <div class='card-title fs-5'>" . $value["job_description"] . "</div>
            <span class='card-text fs-5 fw-bold'> Salary :" . $value["salary"] . "$</span>
            <div>
            <span class='badge text-bg-secondary me-2 fs-6'>" . $value["category"] . "</span>
            </div>";
            // echo "";


            // ! Edited
            echo "</div>";

            echo "<div class='card-footer d-flex justify-content-between align-items-baseline'>";

            // echo "<form method='get' action ='editjob.php'>";
            echo "<button class='btn btn-outline-" . $colorOnStatus . "' data-bs-toggle='modal' data-bs-target='#" . $value["id_job"] . "Modal' >Edit</button>";
            // echo "</form>";
            echo " <div class='text-body-secondary fs-20'>
            Expired on 
            <span class='text-danger me-3'>" . $value["expire_date"] . "</span>
            <a href='#'class='fa-regular fa-user me-3 text-body-secondary' data-bs-toggle='modal' data-bs-target='#" . $value["id_job"] . "listAppModal'> " . count($value["applicants"]) . "</a></div>";
            echo "</div>";
            echo "</div>";
            // !Modal for edit
            echo "
            <div class='modal fade col-8 ' id='" . $value["id_job"] . "Modal' tabindex='-1' aria-labelledby='" . $value["id_job"] . "ModalLabel' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-scrollable modal-lg'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='" . $value["id_job"] . "ModalLabel'>Edit</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                    <div class='modal-body'>
                        <form action='./inc//editjob.inc.php' method='post' class=' form-floating d-flex flex-column justify-content-around align-items-center ' style='height:85vh;'>
        <input type='text' name='id_job' value=" . $value['id_job'] . " hidden>
        <div class='form-floating col-8 d-flex flex-column'>
            <input type='text' class='form-control' id='job_title' placeholder='Job Title' name='job_title' value='" . $value['job_title'] . "'>
            <label for='job_title'>Job Title</label>
        </div>
        <div class='form-floating col-8 d-flex flex-column'>
            <input type='text' class='form-control' id='job_description' placeholder='Job Description' name='job_description' value='" . $value['job_description'] . "'>
            <label for='job_description'>Job Description</label>
        </div>
        <div class='form-floating col-8 d-flex flex-column'>
            <input type='text' class='form-control' id='salary' placeholder='Salary' name='salary' value='" . $value['salary'] . "'>
            <label for='salary'>Salary</label>
        </div>
        <div class='form-floating col-8 d-flex flex-column'>
            <input type='date' class='form-control' id='expire_date' placeholder='Expire Date' name='expire_date' value='" . $value['expire_date'] . "'>
            <label for='expire_date'>Expire Date</label>
        </div>

        <div class='form-floating col-8 d-flex flex-column'>
            <select class='form-select' id='id_category' aria-label='Floating label select example' name='id_category'>";

            $cat = getCategory($connect);
            foreach ($cat as $val) {
                if ($val['id_category'] == $value['id_category'])
                    echo "<option value='" . $val['id_category'] . "' selected>" . $val['category'] . "</option>";
                else

                    echo "<option value='" . $val['id_category'] . "'>" . $val['category'] . "</option>";
            }

            echo "</select>
            <label for='id_category'>Category</label>
        </div>
        <div class='form-floating ms-5 col-8 d-flex justify-content-center '>
            <div class=' col-4 '>";
            if ($value["job_status"] == "o") {
                echo "<input type='radio' class='btn-check ' name='job_status' value='o' id='open' autocomplete='off' checked >
                <label class='btn btn-outline-success' for='open'>Open</label>";
            } else {
                echo "<input type='radio' class='btn-check ' name='job_status' value='o' id='open' autocomplete='off' >
                <label class='btn btn-outline-success' for='open'>Open</label>";
            }
            echo "</div>
            <div class=' col-4 '>";
            if ($value["job_status"] == "c") {
                echo "<input type='radio' class='btn-check ' value='c' name='job_status' id='closed' autocomplete='off' checked>
                <label class='btn btn-outline-danger ' for='closed'>Closed</label>";
            } else {
                echo "<input type='radio' class='btn-check ' value='c' name='job_status' id='closed' autocomplete='off'>
                <label class='btn btn-outline-danger ' for='closed'>Closed</label>";
            }
            echo "</div>
        </div>
        <div class='form-floating col-1 d-flex flex-column'>
        </div>
    
        </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
    <input type='submit' class='btn btn-outline-success' value='Edit' name='edit'>
          </div>
          </form>
      </div>
     </div>
    </div>";
            // ! end Modal for edit
            // !Modal for listing applicant

            echo " <div class='modal fade' id='" . $value["id_job"] . "listAppModal' tabindex='-1' aria-labelledby='" . $value["id_job"] . "listAppModalLabel' aria-hidden='true'>
<div class='modal-dialog modal-dialog-scrollable modal-lg'>
    <div class='modal-content'>
        <div class='modal-header'>
            <h1 class='modal-title fs-5' id='" . $value["id_job"] . "listAppModalLabel'>Applicant List</h1>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
        <table class='table table-light table-hover'>
        <thead>
        <tr>
          <th scope='col'>Name</th>
          <th scope='col'>Applying Date</th>
          <th scope='col'>CV</th>
          <th scope='col'>Status</th>
        </tr>
      </thead>
      <tbody>";

            foreach ($value["applicants"] as $app) {
                $status = ["a" => ["Applied", 0], "p" => ["Pending", 0], "s" => ["Shortlisted", 0], "r" => ["Rejected", 0]];
                $status[$app["app_status"]][1] = 1;
                echo "<tr>
          <th scope='row'>" . $app["fname"] . " " . $app["lname"] . "</th>
          <td>" . $app["app_date"] . "</td>
          <td><a href='" . $app["cv_path"] . "' download='cv'>click here</a></td>";
                echo "<td><select class='form-select' id='app_status' aria-label='Floating label select example' name='app_status'>";

                foreach ($status as $key => $val) {
                    if ($val[1])
                        echo "<option value='" . $key . "' selected>" . $val[0] . "</option>";
                    else

                        echo "<option value='" . $key . "'>" . $val[0] . "</option>";
                }

                echo "</select></td>";




                echo "</tr>";
            }
            echo "</tbody>
            </table>";
            echo "
        </div>
        <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
            <button type='button' class='btn btn-primary'>Save changes</button>
        </div>
    </div>
</div>
</div>
";
        }

        ?>

    </div>


    <!-- // * toast start -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3 ">
        <div id="liveToast" class="toast <?php if (isset($_SESSION["showEditToast"])) {
                                                echo "show";
                                                unset($_SESSION["showEditToast"]);
                                            } ?>" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header ">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <i class="fa-regular fa-bell me-2"> </i>
                <strong class="me-auto"> Edit Done !</strong>
                <!-- <small>11 mins ago</small> -->
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <!-- <div class="toast-body">
                Hello, world! This is a toast message.
            </div> -->
        </div>
    </div>
    <!-- // * toast end -->


    <a href='./cv/cv1.pdf' download='cv'>click here</a>
</body>

</html>