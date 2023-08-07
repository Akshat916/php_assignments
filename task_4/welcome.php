<?php
session_start();

require("require/connection.php");

if(!isset($_SESSION['email'])){
    header("Location:index.php");
    exit();
}

$email = $_SESSION['email'];


$sql = "SELECT * FROM `user` WHERE `email`='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $fname = $row['fname'];
      $lname = $row['lname'];
      $username = $row['username'];
      $interest = $row['interest'];
      $education = $row['education'];
      $profession = $row['profession'];
      $hobbies = $row['hobbies'];
    
      $flag = 3;

      if(!empty($interest)){
        $flag += 1;
      }
      if(!empty($education)){
        $flag += 1;
      }
      if(!empty($profession)){
        $flag += 1;
      }
      if(!empty($hobbies)){
        $flag += 1;
      }
      
      $percent = ($flag/7)*100;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
      .progress-bar {
  display: flex;
  justify-content: center;
  align-items: center;

  width: 2.5rem;
  height: 2.5rem;
  border-radius: 50%;
  background: 
    radial-gradient(closest-side, white 79%, transparent 80% 100%),
    conic-gradient(hotpink <?php echo round($percent,2);?>%, pink 0);    
}

.progress-bar::before {
  color: hotpink;
  font-size: 0.8rem;
  content: "<?php echo round($percent,2);?>%";
}
    </style>
</head>
<body>
    <div class="container">
    <div class="nav">
            <a href="welcome.php" class="blue">Home</a>
            <a> <span class="progress-bar"></span></a>
            <a href="profile.php" class="blue">Profile</a>
            <a href="address.php" class="blue">Address</a>
            <a href="logout.php">Logout</a>
        </div>
        <h1>Hi <?php echo $_SESSION['fname'] ." ". $_SESSION['lname'];?> !</h1>
        <h1>WE WELCOME YOU TO OUR COMMUNITY</h1>
    </div>

</body>
</html>