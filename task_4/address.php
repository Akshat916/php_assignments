<?php
require("require/connection.php");

session_start();

if (!isset($_SESSION['email'])) {
    header("Location:index.php");
    exit();
}

$email = $_SESSION['email'];

$sql = "SELECT * FROM `user` WHERE `email`='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
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
    <title>Address</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="container" style="padding-top:8%;">
        <div class="nav">
            <a href="welcome.php" class="blue">Home</a>
            <a href="profile.php" class="blue">Profile</a>
            <a href="address.php" class="blue">Address</a>
            <a href="logout.php">Logout</a>
        </div>
        <h1>UPDATE ADDRESS</h1>
        <form action="update_address.php" method="post">
            <select id="country" name="country" required>
                <option value="">---select---</option>
                <option value="India">India</option>
                <option value="USA">USA</option>
                <option value="UK">UK</option>
            </select>

            <select id="state" name="state" required>
                <option value="">---select---</option>
                <!-- Populate cities based on the selected country using JavaScript -->
            </select>

            <select id="city" name="city" required>
                <option value="">---select---</option>
                <!-- Populate cities based on the selected country using JavaScript -->
            </select>

            <input type="text" name="postal_code"  id="postal_code" placeholder="Postal Code" required>

            <input type="submit" name="update_address" value="Update Address">
        </form>
        <div id="message"></div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Function to populate cities based on the selected country
            function stateName(selectedCountry) {
                var state = {
                    'India': ['---select---','Madhya Pradesh', 'Maharashtra', 'Gujarat'],
                    'USA': ['---select---','New York', 'California', 'Nevada'],
                    'UK': ['---select---','England', 'Scotland', 'Wales']
                };

                var stateSelect = $('#state');
                stateSelect.empty();

                state[selectedCountry].forEach(function (state) {
                    stateSelect.append('<option value="' + state + '">' + state + '</option>');
                });
            }

            function citiesName(selectedState) {

                var cities = {
                    
                    'Madhya Pradesh': ['---select---','Bhopal', 'Indore', 'Jabalpur'],
                    'Maharashtra': ['---select---','Nagpur', 'Mumbai', 'Pune'],
                    'Gujarat': ['---select---','Ahmedabad', 'Vadodara', 'Gandhi Nagar'],
                    'New York': ['---select---','New York City'],
                    'California': ['---select---','Los Angeles'],
                    'Nevada': ['---select---','Las Vegas'],
                    'England': ['---select---','London'],
                    'Scotland': ['---select---','Edinburgh'],
                    'Wales': ['---select---','Cardiff']
                };

                var citySelect = $('#city');
                citySelect.empty();

                cities[selectedState].forEach(function (city) {
                    citySelect.append('<option value="' + city + '">' + city + '</option>');
                });
            }


            // Call citiesName when the country selection changes
            $('#country').change(function () {
                var selectedCountry = $(this).val();
                stateName(selectedCountry);
            });

            $('#state').change(function () {
                var selectedState = $(this).val();
                citiesName(selectedState);
            });

        });
    </script>

</body>

</html>