<?php

session_start();
if (isset($_SESSION["id_app"]) || isset($_SESSION["id_org"]))
{
session_destroy();
header("location: ../index.php");
}
else 
header("location: ../index.php");
