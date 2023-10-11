<?php
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $student_firstname = $_POST["student_firstname"];
    $student_lastname = $_POST["student_lastname"];
    $student_course = $_POST["courses"];
    if(!empty($_FILES['photo']['name'])){
        $uploadDir = 'uploads/';
        $uploadFile  = $uploadDir . basename($_FILES['photo']['name']);
        if(move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)){
            $sql = 'INSERT INTO students (firstname, lastname, course, photo) VALUES (?,?,?,?);';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$student_firstname,$student_lastname,$student_course,$uploadFile]);
            $rowCount = $stmt->rowCount();
            if($rowCount > 0){
                $_SESSION["add_student_info"] = "Student added successfully";
            }else{
                $_SESSION["add_student_info"] = "Something went wrong!";
            }
            header('location: ../student-list.php');
            exit();
        }
    }
}