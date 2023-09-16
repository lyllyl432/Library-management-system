<?php
session_start();
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "library_system";

// $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
try{
    $conn = new PDO("mysql:host={$serverName};dbname={$dbName}", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    die("Connection Failed" . $e->getMessage());
}