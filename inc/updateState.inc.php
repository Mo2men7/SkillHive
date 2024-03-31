<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";
session_start();
if (isset($_GET["submit"])) {
    try {
        $id_job = $_GET["submit"];
        unset($_GET["submit"]);
        require_once "connection.php";
        foreach ($_GET as $key => $value) {
            $arr = explode('-', $key);
            print_r($arr);

            $stm = $connect->prepare("UPDATE job_app SET app_status=? WHERE id_job =? And id_app=? ");
            $stm->execute([
                $value,
                $id_job,
                explode('-', $key)[0]
            ]);
        }
        $_SESSION["showEditToast"] = 1;
        header("Location: ../jobs.php");
    } catch (PDOException $e) {
        header("Location: ../jobs.php?error=1");
    }
}
