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

// Fetch data
$sql = "SELECT stress_level, timestamp FROM stress_data ORDER BY timestamp DESC";
$result = $conn->query($sql);

// Output as JSON
$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
echo json_encode($data);

$conn->close();
?>
