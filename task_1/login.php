<?php
session_start();

require('connection.php');

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE email='".$email."' AND password='".md5($password)."'";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['lname'] = $row['lname'];
            header("Location: welcome.php");
        }
     }
     else{
        $Message = "Invalid username or password";
        header("Location: index.php?Message=".$Message);
     }
    }
    $conn->close();
?>