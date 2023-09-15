<?php
include "database.inc.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = intval($_POST["id"]);
    $sql = "DELETE FROM category WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../category.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    if(mysqli_stmt_execute($stmt)){
        $_SESSION["delete-success"] = "Deleted Successfully";
        header("location: ../category.php");
        exit();
    }else{
        $_SESSION["delete-error"] = "Error:" . mysqli_error($conn);
        header("location: ../category.php");
        exit();
    }
}