<?php
include "database.inc.php";

$sql = "SELECT * 
        FROM category ORDER BY id ASC;";

$booksCategoryStmt = $conn->prepare($sql);
$booksCategoryStmt->execute();