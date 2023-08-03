<?php
session_start();

if(!isset($_SESSION['fname']) and !isset($_SESSION['lname'])){
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
        <div class="logout">
            <a href="logout.php">logout</a>
        </div>
        <h1>Hi <?php echo $_SESSION['fname'] ." ". $_SESSION['lname'];?> !</h1>
        <h1>WE WELCOME YOU TO OUR COMMUNITY</h1>
    </div>

</body>
</html>