<?php
session_start();
include "database.inc.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST["id"];
    $isbn = $_POST["isbn"];
    $title = $_POST["id"];
    $sql = "UPDATE category SET courses = ? WHERE id = ?;";
    $stmt  = $conn->prepare($sql);
    $stmt->execute([$category, $id]);
    $rowCount = $stmt->rowCount();
    if($rowCount > 0){
        $_SESSION["edit-success"] = "Edited Successfully";
        header("location: ../category.php");
    }else{
        $_SESSION["edit-error"] = "Failed to Edit";
        header("location: ../category.php");
    }
    exit();
}