<?php
include "database.inc.php";

$sql = "SELECT * 
        FROM books ORDER BY id ASC;";

$booksStmt = $conn->prepare($sql);
$booksStmt->execute();