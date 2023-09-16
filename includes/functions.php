<?php
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

    // $stmt = mysqli_stmt_init($conn);
    // if(!mysqli_stmt_prepare($stmt, $sql)){
    //     header("location: ../category.php?error=stmtfailed");
    //     exit();
    // }
    // mysqli_stmt_bind_param($stmt, "s", $categoryName);
    // // mysqli_stmt_execute($stmt);
    // try{
    //     if( mysqli_stmt_execute($stmt)){
    //         $_SESSION["execution"] = "Category added successfully";
    //         header("location: ../category.php?error=executed");
    //         exit();
    //     }
    // }catch(Exception $e){
    //     if (strpos(mysqli_error($conn), "Duplicate entry") !== false){
    //         $_SESSION["execution"] = "Category added successfully";
    //         header("location: ../category.php?error=notexecuted");
    //         exit();
    //     } 
    // }  
    // mysqli_stmt_close($stmt);
    // mysqli_close($conn);    
}


    

