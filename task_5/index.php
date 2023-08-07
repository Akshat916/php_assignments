<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    
    <div class="container">
        <h1>Weather App</h1>
        <form action="get_weather.php" method="post">
        <div class="form-input">
                <input type="text" name="username" placeholder="Username">
            </div>
            <input type="submit" value="Get Weather">
        </form>
    </div>

</body>
</html>