<?php
session_start();
unset($_SESSION['fname']);
unset($_SESSION['lname']);
header("Location:index.php");
?>