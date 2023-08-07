<?php
session_start();

if(!isset($_SESSION['fname']) and !isset($_SESSION['lname']) and !isset($_SESSION['email'])){
    header("Location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    
    <div class="container">
    <div class="nav">
            <a href="welcome.php" class="blue">Home</a>
            <a href="profile.php" class="blue">Profile</a>
            <a href="logout.php">Logout</a>
        </div>
        <h1>ABOUT US</h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste, dicta iure nemo voluptates nesciunt sed amet deserunt! Ut reprehenderit quidem ad voluptates nihil modi perferendis esse at! Odit, dolor porro.</p>
    </div>

</body>
</html>