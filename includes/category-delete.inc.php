<?php
include "database.inc.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = intval($_POST["id"]);
    $sql = "DELETE FROM category WHERE id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    $rowCount = $stmt->rowCount();
    if($rowCount > 0){
        $_SESSION["delete-success"] = "Deleted Successfully";
        header("location: ../category.php");
    }else{
        $_SESSION["delete-error"] = "Error:" . mysqli_error($conn);
        header("location: ../category.php");
    }
    exit();
}