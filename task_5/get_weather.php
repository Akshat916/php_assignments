<?php
if(isset($_POST['username'])){
    function getUserLocation($ip) {
    $apiKey = '5c921f129bb2a2';

    // If running on localhost, provide default location information
    if ($ip === '127.0.0.1') {
        return [
            'ip' => $ip,
            'city' => 'Bhopal',
            'latitude' => '23.2599',
            'longitude' => '77.4126'
        ];
    }

    // API request to get user data from IP
    $url = "http://ipinfo.io/$ip?access_key=$apiKey";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $locationData = json_decode($response, true);

    return $locationData;
}

$userIP = $_SERVER['REMOTE_ADDR']; // getting users IP address
$userLocation = getUserLocation($userIP);
if($userIP === '127.0.0.1'){
    $lat = $userLocation['latitude'];
    $long = $userLocation['longitude'];
}
else{
    $latlong = $userLocation['loc'];
    list($lat, $long) = explode(',', $latlong);
}



// Weather API code

$name = $_POST['username'];
$apiKey = 'f2dc96a5874460b528288d4f8500e1c3';

// Make an API request to get weather data
$apiUrl = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$long&appid=$apiKey";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);

// Display weather information
if ($data && isset($data['main'])) {
    $weather = $data['weather'][0]['main'];
    $temperature = ($data['main']['temp'])-273.15; // Converting Kelvin to Celsius

    // Set the default timezone to India (IST)
    date_default_timezone_set('Asia/Kolkata');

    // UNIX timestamp
    $sunrise_unix = $data['sys']['sunrise'];
    $sunset_unix = $data['sys']['sunset'];

    // Convert UNIX timestamp to Indian time (IST)
    $sunrise = date('H:i:s a', $sunrise_unix);
    $sunset = date('H:i:s a', $sunset_unix);


    // Changing background color according to diffrent temperature
    
    if($temperature < 0){
        $bg_color = "#368BC1";//ice
    }
    elseif($temperature > 0 and $temperature < 15){
        $bg_color = "#A5F2F3";//cold
    }
    elseif($temperature > 15 and $temperature < 25){
        $bg_color = "#ff7251";//warm
    }
    elseif($temperature > 25 and $temperature < 30){
        $bg_color = "#ff8c00";//hot
    }
    else{
        $bg_color = "#ff4500";//very hot
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body style="background-color: <?php echo $bg_color; ?>">
    <div class="container">
        <div class="nav">
            <a href="index.php">Home</a>
        </div>
        <?php
        echo "<h1>Hi, $name</h1>";
        echo "<h2>YOUR CURRENT WEATHER DETAILS</h2>";
        echo "<h2>Weather : $weather</h2>";
        echo "<h2>Temperature: $temperature °C  </h2>";
        echo "<h2>Sunrise: $sunrise</h2>"; 
        echo "<h2>Sunset: $sunset</h2>";
        ?>
    </div>
</body>
</html>
<?php
} else {
     "Weather data not available for $location.";
}
}
else{
    header("Location:index.php");
}
?>