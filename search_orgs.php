<?php
// Create a connection
$conn = mysqli_connect('localhost', 'root', '', 'greenbin');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET["search"])) {
    $searchTerms = $_GET["search"];
  
    // Perform the search query based on the search term
    $searchSql = "SELECT * FROM orgs WHERE name LIKE '%$searchTerms%'";
    $result = $conn->query($searchSql);
  
    // Convert the search results to an array
    $searchResults = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $searchResults[] = $row;
      }
    }
  
    // Return the search results as JSON
    echo json_encode($searchResults);
  
    // Close the database connection
    $conn->close();
    exit(); // Stop further execution after handling search
  }
  ?>