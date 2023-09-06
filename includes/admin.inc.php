<?php
session_start();
include "database.inc.php";
include "functions.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $userName = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $pwd = filter_var($_POST["pwd"], FILTER_SANITIZE_STRING);

    if(invalidAdmin($conn, $userName, $pwd) !== false){
        header("location: ../admin.php?error=adminnotfound");
        exit();
    }else{
        header("location: ../home.php");
    }


    
}