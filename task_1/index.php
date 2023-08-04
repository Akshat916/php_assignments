<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login and logout</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>LOGIN</h1>
        <p>
        <?php
            if(isset($_GET['Message'])){
                echo $_GET['Message'];
            }
            elseif(isset($_GET['emailErr'])){
                echo $_GET['emailErr'];
            }
            elseif(isset($_GET['passwordErr'])){
                echo $_GET['passwordErr'];
            }
            else{
                echo '';
            }
        ?>
        </p>
        <form action="login.php" method="post">
            <div class="form-input">
                <input type="text" name="email" placeholder="Email" value="<?php echo $_GET['email']; ?>">
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="Password">
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>