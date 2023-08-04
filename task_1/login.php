<?php
session_start();

require('require/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $flag = 0;

    if (empty($email)) {
        $emailErr = 'Email is required';
        header("Location:index.php?emailErr=" . $emailErr);
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = 'Invaild email';
        header("Location:index.php?emailErr=" . $emailErr);
    } else {
        if (empty($password)) {
            $passwordErr = 'Password is required';
            header("Location:index.php?passwordErr=" . $passwordErr."&email=".$email);
        } else {
            $flag += 1;
        }
        $flag += 1;
    }


    if ($flag === 2) {

        $sql = "SELECT * FROM user WHERE email='" . $email . "' AND password='" . md5($password) . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                header("Location: welcome.php");
            }
        } else {
            $Message = "Invalid username or password";
            header("Location: index.php?Message=" . $Message."&email=".$email);
        }
    }
}
$conn->close();
?>