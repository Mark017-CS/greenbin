<?php
// Create a connection
$conn = mysqli_connect('localhost', 'root', '', 'greenbin');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Check if the delete action is requested
if (isset($_GET["delete"]) && isset($_GET["id"])) {
    $id = $_GET["id"];
    // Delete the entry with the given ID from the "waste" table
    $deleteSql = "DELETE FROM waste WHERE id='$id'";

    if ($conn->query($deleteSql) === TRUE) {
        // Data deleted successfully
        echo json_encode(array("status" => "success", "message" => "Data deleted successfully."));
    } else {
        // Error deleting data
        echo json_encode(array("status" => "error", "message" => "Error deleting data: " . $conn->error));
    }

    // Close the database connection
    $conn->close();
    exit(); // Stop further execution after handling deletion
}
?>