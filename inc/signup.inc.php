<?php
if (isset($_POST["register"])) {
    try {
        echo "lol";
        print_r($_FILES["file"]);

        require_once "connect.php";
        $stm = $connect->prepare("insert into organization(org_name,date_of_est,email,password,org_description,location) values (?,?,?,?,?,?)");

        $stm->execute([
            $_POST["org_name"],
            $_POST["date_of_est"], $_POST["email"],
            $_POST["password"],
            $_POST["org_description"],
            $_POST["location"]
        ]);
        require_once "upload_org.inc.php";

        $stm = $connect->prepare("UPDATE organization
        SET org_pic = ?
        WHERE id_org=?;");

        $stm->execute([
            $imgname,
            $connect->lastInsertId()
        ]);
        header("Location: ../success.php");
    } catch (PDOException $e) {
        header("Location: ../signup.php?error=1");
    }
}
