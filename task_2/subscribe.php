<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['name'])) {
        $email = $_POST["email"];
        $name = $_POST["name"];
        $flag = 0;
        
        if (empty($email)) {
            $emailErr = 'Email is required';
            header("Location:index.php?emailErr=" . $emailErr."&name=".$name);
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'Invaild email';
            header("Location:index.php?emailErr=" . $emailErr."&name=".$name);
        } else {
            $flag += 1;
        }
        
        if (empty($name)) {
            $nameErr = 'Name is required';
            header("Location:index.php?nameErr=". $nameErr."&email=".$email);
        } else {
            $flag += 1;
        }
        
        
        if ($flag === 2) {
            setcookie("name", $name, time() + 120,"/");
            header("Location:welcome.php");
        }
    }
}
else{
    header("Location:index.php");
}
?>