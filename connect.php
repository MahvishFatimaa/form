<?php
// Database connection parameters


// Create connection
$conn = new mysqli('localhost', 'root', '','vibes');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters
    $stmt = $conn->prepare("INSERT INTO vibecheck (name, email, age, instagram_handle, pinterest_handle, role, paint, fav_sitcom, perception_of_seeinglife, fav_artist, fav_song, super_power, fav_person) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissssssssss", $name, $email, $age, $instagram_handle, $pinterest_handle, $role, $paint, $fav_sitcom, $perception_of_seeinglife, $fav_artist, $fav_song, $super_power, $fav_person);

    // Set parameters and execute
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age1'];
    $instagram_handle = $_POST['username'];
    $pinterest_handle = $_POST['username'];
    $role = $_POST['role'];
    $paint = $_POST['paint'];
    $fav_sitcom = $_POST['Fav-sitcom'];
    $perception_of_seeinglife = $_POST['perception-of-seeinglife'];
    $fav_artist = $_POST['fav-artist'];
    $fav_song = $_POST['fav-song'];
    $super_power = $_POST['super-power'];
    $fav_person = $_POST['fav-person'];

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>