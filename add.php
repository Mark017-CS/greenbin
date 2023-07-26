<?php
// Create a connection
$conn = mysqli_connect('localhost', 'root', '', 'greenbin');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$item = $_POST["item"];
$weight = $_POST["weight"];
$wasteType = $_POST["wasteType"];
$xdate = $_POST["xdate"];
$contact = ""; // You can add a placeholder contact or leave it empty as needed

// Insert data into the "waste" table
$sql = "INSERT INTO waste (item, weight, wasteType, xdate, org_contact) 
        VALUES ('$item', '$weight', '$wasteType', '$xdate', '$contact')";

if ($conn->query($sql) === TRUE) {
    // Data inserted successfully
    echo json_encode(array("status" => "success", "message" => "Data inserted successfully."));
} else {
    // Error inserting data
    echo json_encode(array("status" => "error", "message" => "Error inserting data: " . $conn->error));
}

// Close the database connection
$conn->close();
?>