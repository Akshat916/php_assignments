<?php
require('require/connection.php');

session_start();

if(!isset($_SESSION['email'])){
  header("Location:index.php");
  exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $interest = $_POST["interest"];
    $education = $_POST["education"];
    $profession = $_POST["profession"];
    $hobbies = $_POST["hobbies"];
    $email = $_SESSION['email'];

    $sql = "UPDATE `user` SET `interest`='$interest',`education`='$education',`profession`='$profession',`hobbies`='$hobbies' WHERE `email`='$email'";

    if (mysqli_query($conn, $sql)) {
        // echo "Record updated successfully";
        header("Location:about.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }
}
?>