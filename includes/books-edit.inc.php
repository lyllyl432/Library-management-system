<?php
session_start();
include "database.inc.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST["id"];
    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $category = $_POST["category"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $datePublish = $_POST["date-publish"];

    $sql = 'UPDATE books 
            SET isbn = ?, title = ?, category = ?, author = ?, publisher = ?, date_publish = ?
            WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$isbn,$title,$category,$author,$publisher,$datePublish,$id]);
    $rowCount = $stmt->rowCount();
    if($rowCount > 0){
        $_SESSION["books_update"] = "Books Updated Sucessfully";
    }else{
        $_SESSION["books_update"] = "Something went wrong!";
    }
    header("location: ../books.php");
    exit();
}