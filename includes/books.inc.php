<?php
session_start();
include "database.inc.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $category = $_POST["category"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $datePublish = $_POST["date-publish"];

    $sql = "INSERT INTO books(isbn,title,category,author,publisher,date_publish)
            VALUES(?,?,?,?,?,?);";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$isbn,$title,$category,$author,$publisher,$datePublish]);
    $rowCount = $stmt->rowCount();
    if($rowCount > 0){
        $_SESSION["books_insertion"] = "Books Added Successfully";
        header("location: ../books.php");
    }else{
        $_SESSION["books_insertion"] = "There is an error!";
        header("location: ../books.php");
    }
    exit();
}