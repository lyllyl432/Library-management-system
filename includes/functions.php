<?php
session_start();
function invalidAdmin($conn, $userName, $pwd){
    $result;
    $sql = "SELECT admin.admin_id, admin.password
            FROM admin
            WHERE username = ?;";
    $stmt = $conn->prepare($sql);
    $stmt-> execute([$userName]);
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        if($pwd === $row["password"]){
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $userName;
            $_SESSION["admin_id"] = $row["admin_id"];
            return false;
        }else{
            return true;
        }
    }
    $conn = null;    
}
function storeCategory($conn, $categoryName){
    $sql = "INSERT INTO category(courses)
            VALUES(?);";

    $stmt = $conn->prepare($sql);
    $stmt-> execute([$categoryName]);
    $rowCount = $stmt->rowCount();
    if($rowCount > 0){
        $_SESSION["execution"] = "Category added successfully";
            header("location: ../category.php?error=executed");
    }else{
        $_SESSION["execution"] = "Category added successfully";
        header("location: ../category.php?error=notexecuted");
    }
    exit();
}


    

