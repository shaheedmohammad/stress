<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stress_monitor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get stress level from GET request
if (isset($_GET['stress'])) {
    $stressLevel = $_GET['stress'];

    // Insert data into table
    $sql = "INSERT INTO stress_data (stress_level, timestamp) VALUES ('$stressLevel', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Data logged successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No stress data received!";
}

$conn->close();
?>
