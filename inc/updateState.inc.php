<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";
session_start();
if (isset($_GET["submit"])) {
    $id_job = $_GET["submit"];
    unset($_GET["submit"]);
    require_once "connection.php";
    foreach ($_GET as $key => $value) {
        $arr = explode('-', $key);
        print_r($arr);

        $stm = $connection->prepare("UPDATE job_app SET app_status=? WHERE id_job =? And id_app=? ");
        $stm->bind_param('sii',
            $value,
            $id_job,
            explode('-', $key)[0]
        );
        $stm->execute();
    }
    $_SESSION["showEditToast"] = 1;

    if ($connection->connect_errno)
        header("Location: ../jobs.php?error=1");
    else
        header("Location: ../jobs.php");
}
