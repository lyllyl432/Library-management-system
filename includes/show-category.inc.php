<?php
include "database.inc.php";

$sql = "SELECT * 
        FROM category ORDER BY id ASC;";

$resultObject = mysqli_query($conn, $sql);
mysqli_close($conn);