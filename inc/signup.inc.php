<?php
if (isset($_POST["register"])) {
    echo "lol";
    print_r($_FILES["file"]);
    require_once "connection.php";
    $check = $connection->query("select * from organization where email='".$_POST["email"]."'");
    if ($check->fetch_all())
    {
    header("Location: ../sign-in-org-sendreq.php?er=1");
    exit();
}
// echo"hh";
    // exit();
    $stm = $connection->prepare("insert into organization(org_name,date_of_est,email,password,org_description,location) values (?,?,?,?,?,?)");
    
    $stm->bind_param(
        'ssssss',
        $_POST["org_name"],
        $_POST["date_of_est"],
        $_POST["email"],
        $_POST["password"],
        $_POST["org_description"],
        $_POST["location"]
    );
    $stm->execute();

    $target_dir = "../org_pic/";
    require_once "upload_org.inc.php";
    $lastid = $connection->insert_id;
    $stm = $connection->prepare("UPDATE organization
        SET org_pic = ?
        WHERE id_org=?;");
    $stm->bind_param(
        'si',
        $imgname,
        $lastid
    );
    $stm->execute();

    if ($connection->connect_errno)
        header("Location: ../sign-in-org-sendreq.php?error=1");
    else
        header("Location: ../sign-in-org-sendreq.php");
}
