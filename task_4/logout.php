<?php
session_start();
unset($_SESSION['fname']);
unset($_SESSION['lname']);
unset($_SESSION['email']);
header("Location:index.php");
?>