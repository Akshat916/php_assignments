<?php
require("require/connection.php");

session_start();

if(!isset($_SESSION['fname']) and !isset($_SESSION['lname']) and !isset($_SESSION['email'])){
    header("Location:index.php");
    exit();
}

$email = $_SESSION['email'];

$sql = "SELECT * FROM `user` WHERE `email`='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $interest = $row['interest'];
      $education = $row['education'];
      $profession = $row['profession'];
      $hobbies = $row['hobbies'];
  }
} else {
  echo "0 results";
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
    
    <div class="container" style="padding-top:8%;">
        <div class="nav">
            <a href="welcome.php" class="blue">Home</a>
            <a href="profile.php" class="blue">Profile</a>
            <a href="logout.php">Logout</a>
        </div>
        <h1>Your Profile Details</h1>
        <form action="update.php" method="post">
            <div class="form-input">
                <input type="text" name="interest" placeholder="Topic of interest" value="<?php echo $interest;?>">
            </div>
            <div class="form-input">
                <input type="text" name="education" placeholder="Education" value="<?php echo $education;?>">
            </div>
            <div class="form-input">
                <input type="text" name="profession" placeholder="Profession" value="<?php echo $profession;?>">
            </div>
            <div class="form-input">
                <input type="text" name="hobbies" placeholder="Hobbies" value="<?php echo $hobbies;?>">
            </div>
            <input type="submit" value="Update">
        </form>
    </div>

</body>
</html>