<?php
include "functions.php";
include "database.inc.php";
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $categoryName = filter_var($_POST["category"],FILTER_SANITIZE_STRING);

    storeCategory($conn, $categoryName);
}