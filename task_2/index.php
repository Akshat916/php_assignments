<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Newsletter form</h1>
        <p>
        <?php
            if(isset($_GET['emailErr'])){
                echo $_GET['emailErr'];
            }
            elseif(isset($_GET['nameErr'])){
                echo $_GET['nameErr'];
            }
            else{
                echo '';
            }
        ?>
        </p>
        <form action="subscribe.php" method="post">
            <div class="form-input">
                <input type="text" name="name" placeholder="Name" value="<?php echo $_GET['name']; ?>">
            </div>
            <div class="form-input">
                <input type="text" name="email" placeholder="Email" value="<?php echo $_GET['email']; ?>">
            </div>
            <input type="submit" name="subscribe" value="Subscribe">
        </form>
    </div>
</body>
</html>