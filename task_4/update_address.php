<?php
session_start();
require("require/connection.php");

if(!isset($_SESSION['email'])){
  header("Location:index.php");
  exit();
}

if (isset($_POST['update_address'])) {
  $email = $_SESSION['email'];
  $country = $_POST['country'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $postal_code = $_POST['postal_code'];

  $sql = "UPDATE `user` SET `country`='$country',`state`='$state',`city`='$city',`postal_code`='$postal_code' WHERE email='$email'";
  
  if($conn->query($sql)===true){
    header("Location:welcome.php");
  }
}
?>
