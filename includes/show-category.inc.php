<?php
include "database.inc.php";

$sql = "SELECT * 
        FROM category ORDER BY id ASC;";

$stmt = $conn->prepare($sql);
$stmt->execute();