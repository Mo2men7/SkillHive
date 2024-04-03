<?php

require_once "connection.php";

function jobs($connect, $org_id)
{
    // require_once "connect.php";
    $stmjob = $connect->prepare("SELECT jobs.* ,category.category FROM jobs inner join category on jobs.id_category = category.id_category where jobs.org_id= ? ORDER BY jobs.publish_date DESC");
    // echo "$org_id";
    $stmjob->bind_param('i', $org_id);
    $stmjob->execute();
    // $stmt->bind_result($district);

    $resjob = $stmjob->get_result()->fetch_all(MYSQLI_ASSOC);
    $fixingId = array();
    foreach ($resjob as $job) {
        $fixingId[$job["id_job"]] = $job;
        $stmapp = $connect->prepare("SELECT applicant.* , job_app.* from applicant inner join job_app on applicant.id_app=job_app.id_app where job_app.id_job=?; ");

        $stmapp->bind_param(
            'i',
            $job["id_job"]
        );
        $stmapp->execute();
        $resapp = $stmapp->get_result()->fetch_all(MYSQLI_ASSOC);
        foreach ($resapp as $app) {
            $fixingId[$job["id_job"]]["applicants"][$app["id_app"]] = $app;
        }
    }
    return $fixingId;
}
function getCategory($connect)
{
    $stm = $connect->prepare("SELECT * FROM category;");
    $stm->execute();
    $res = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
    return $res;
}
function ShowJob($connect, $value)
{
    if ($value["job_status"] == "c") {
        $colorOnStatus = "fa-solid fa-xmark text-danger";
        $jobStatus = "Closed";
    } else {
        $colorOnStatus = "fa fa-check";
        $jobStatus = "Opened";
    }

    $div = "<div class='eachjob " . $jobStatus . " job-item p-4 mb-4'>
    <div class='row g-4'>
        <div class='col-sm-12 col-md-8 d-flex align-items-center'>
            <div class='text-start ps-4'>
                <h5 class='mb-3'>" . $value["job_title"] . "</h5>
                <p class='description'>" . $value["job_description"] . "</p>
                <span class='text-truncate me-3'><i class='fa-solid fa-layer-group text-primary me-2'></i>" . $value["category"] . "</span>
                <span class='text-truncate me-3'><i class='" . $colorOnStatus . " text-primary me-3'></i>" . $jobStatus . "</span>
                <span class='text-truncate me-0'><i class='far fa-money-bill-alt text-primary me-2'></i>$" . $value["salary"] . "</span>
            </div>
        </div>
        <div class='col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center'>
            <div class='d-flex mb-3'>";
    if (isset($value["applicants"])) {
        $div .= "<a href='' class='btn btn-light btn-square me-3 rounded-0' data-bs-toggle='modal' data-bs-target='#" . $value["id_job"] . "listAppModal'><i class='fa-regular fa-user'></i> " . count($value["applicants"]) . "</a>";
    } else
        $div .= "<a href='' class='btn btn-light btn-square me-3 rounded-0' data-bs-toggle='modal' data-bs-target='#" . $value["id_job"] . "listAppModal'><i class='fa-regular fa-user'></i>0</a>";

    // <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
    // $div .= "<button class='btn btn-outline-" . $colorOnStatus . "' data-bs-toggle='modal' data-bs-target='#" . $value["id_job"] . "Modal' >Edit</button>";
    $div .= "<a class='btn btn-primary rounded-0' data-bs-toggle='modal' data-bs-target='#" . $value["id_job"] . "Modal' >Edit</a>
            </div>
            <small class='text-truncate'><i class='far fa-calendar-alt text-primary me-2'></i>DeadLine: " . $value["expire_date"] . "</small>
        </div>
    </div>
</div>";

    // $div = "<div class='eachjob ".$jobStatus." card border-" . $colorOnStatus . " mb-3 my-4 '>
    // <div class='card-header d-flex justify-content-between align-items-baseline'>
    // <div class='d-flex  align-items-center'>
    // <span class='fw-bold fs-4'>" . $value["job_title"] . "</span>

    // <span class=' badge text-bg-" . $colorOnStatus . " fs-7 ms-2'>" . $jobStatus . "</span>

    // </div>
    // <div  class='text-body-secondary fs-20'>Published on " . $value["publish_date"] . "</div>
    // </div>
    // <div class='card-body'>
    // <div class='card-title fs-5'>" . $value["job_description"] . "</div>
    // <span class='card-text fs-5 fw-bold'> Salary :" . $value["salary"] . "$</span>
    // <div>
    // <span class='badge text-bg-secondary me-2 fs-6'>" . $value["category"] . "</span>
    // </div>";
    // $div .= "</div>";

    // $div .= "<div class='card-footer d-flex justify-content-between align-items-baseline'>";


    // $div .= "<button class='btn btn-outline-" . $colorOnStatus . "' data-bs-toggle='modal' data-bs-target='#" . $value["id_job"] . "Modal' >Edit</button>";

    // $div .= " <div class='text-body-secondary fs-20'>
    // Expired on 
    // <span class='text-danger me-3'>" . $value["expire_date"] . "</span>";
    // if (isset($value["applicants"])) {
    //     $div .= "<a href='#'class='fa-regular fa-user me-3 text-body-secondary' data-bs-toggle='modal' data-bs-target='#" . $value["id_job"] . "listAppModal'> " . count($value["applicants"]) . "</a></div>";
    // } else
    //     $div .= "<a a href='#' class='fa-regular fa-user me-3 text-body-secondary' data-bs-toggle='modal' data-bs-target='#" . $value["id_job"] . "listAppModal'>0</a></div>";

    // $div .= "</div>";
    // $div .= "</div>";
    return $div;
}

function ModalToEdit($connect, $value)
{
    $div = "
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
            $div .= "<option value='" . $val['id_category'] . "' selected>" . $val['category'] . "</option>";
        else

            $div .= "<option value='" . $val['id_category'] . "'>" . $val['category'] . "</option>";
    }

    $div .= "</select>
            <label for='id_category'>Category</label>
        </div>
        <div class='form-floating ms-5 col-8 d-flex justify-content-center '>
            <div class=' col-4 '>";
    if ($value["job_status"] == "o") {
        $div .= "<input type='radio' class='btn-check ' name='job_status' value='o' id='" . $value["id_job"] . "open' autocomplete='off' checked >
                <label class='btn btn-outline-primary' for='" . $value["id_job"] . "open'>Open</label>";
    } else {
        $div .= "<input type='radio' class='btn-check ' name='job_status' value='o' id='" . $value["id_job"] . "open' autocomplete='off' >
                <label class='btn btn-outline-primary' for='" . $value["id_job"] . "open'>Open</label>";
    }
    $div .= "</div>
            <div class=' col-4 '>";
    if ($value["job_status"] == "c") {
        $div .= "<input type='radio' class='btn-check ' value='c' name='job_status' id='" . $value["id_job"] . "closed' autocomplete='off' checked>
                <label class='btn btn-outline-danger ' for='" . $value["id_job"] . "closed'>Closed</label>";
    } else {
        $div .= "<input type='radio' class='btn-check ' value='c' name='job_status' id='" . $value["id_job"] . "closed' autocomplete='off'>
                <label class='btn btn-outline-danger ' for='" . $value["id_job"] . "closed'>Closed</label>";
    }
    $div .= "</div>
        </div>
        <div class='form-floating col-1 d-flex flex-column'>
        </div>
    
        </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-secondary rounded-0' data-bs-dismiss='modal'>Close</button>
    <input type='submit' class='btn btn-primary rounded-0' value='Edit' name='edit'>
          </div>
          </form>
      </div>
     </div>
    </div>";
    return $div;
}
function ModalToList($connect, $value)
{
    if (isset($value["applicants"])) {
        $div = "<form method='get' action='./inc/updateState.inc.php'>";

        $div .= " <div class='modal fade' id='" . $value["id_job"] . "listAppModal' tabindex='-1' aria-labelledby='" . $value["id_job"] . "listAppModalLabel' aria-hidden='true'>
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
            $div .= "<tr>
          <th scope='row'>" . $app["fname"] . " " . $app["lname"] . "</th>
          <td>" . $app["app_date"] . "</td>
          <td><a class='btn btn-primary' href='" . $app["cv_path"] . "' download='" . $app["fname"] . $app["lname"] . "_cv'><i class='fa fa-download'></i></a></td>";
            $div .= "<td><select class='form-select' id='app_status' aria-label='Floating label select example' name='" . $app["id_app"] . "-app_status'>";

            foreach ($status as $key => $val) {
                if ($val[1])
                    $div .= "<option value='" . $key . "' selected>" . $val[0] . "</option>";
                else

                    $div .= "<option value='" . $key . "'>" . $val[0] . "</option>";
            }

            $div .= "</select></td>
        </tr>";
        }
        $div .= "</tbody>
            </table>";
        $div .= "
        </div>
        <div class='modal-footer'>
            <button type='button' class='btn btn-secondary rounded-0' data-bs-dismiss='modal'>Close</button>
            <button type='submit' class='btn btn-primary rounded-0' name='submit' value='" . $value["id_job"] . "'>Save Changes</button>
        </div>
    </div>
</div>
</div>
";
        $div .= "</form>";
    } else {
        $div = " <div class='modal fade' id='" . $value["id_job"] . "listAppModal' tabindex='-1' aria-labelledby='" . $value["id_job"] . "listAppModalLabel' aria-hidden='true'>
<div class='modal-dialog modal-dialog-scrollable'>
    <div class='modal-content'>
        <div class='modal-body'>
        <p>This Job Has No Applicants
        </div>
        <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
        </div>
    </div>
</div>
</div>";
    }

    return $div;
}
