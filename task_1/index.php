<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login and logout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>LOGIN</h1>
        <p>
        <?php
            if(isset($_GET['Message'])){
                echo $_GET['Message'];
            }
        ?>
        </p>
        <form action="login.php" method="post">
            <div class="form-input">
                <input type="text" name="email" placeholder="Email">
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="Password">
            </div>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>