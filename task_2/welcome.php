<?php

if (!isset($_COOKIE["name"])) {
    header("Location: index.php");
}
else{
    $name = $_COOKIE["name"];
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
        <h1>THANKS, <span style="text-transform: uppercase;"> <?php echo $name; ?> </span> FOR</h1>
        <h1>SUBSCRIBING TO OUR NEWSLETTER</h1>
    </div>

</body>
</html>