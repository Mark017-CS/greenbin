<?php
// Create a connection
$conn = mysqli_connect('localhost', 'root', '', 'greenbin');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$today = date("Y-m-d");

// Get form data
$item = $_POST["item"];
$weight = $_POST["weight"];
$xdate = $_POST["xdate"];



$rindPeelShell = array(
    "potato",
    "carrots",
    "orange",
    "bananas",
    "shrimps",
    "pineapple",
    "watermelon",
    "almonds",
    "corn"
);

$meatBones = array(
    "fats",
    "fish meal",
    "meat meal",
    "bone meal",
    "leftover bones",
    "leftover meat"
);

$seedNut = array(
    "pumpkins",
    "watermelon",
    "bell peppers",
    "cucumber",
    "melon"
);

$stemLeafScrap = array(
    "broccoli",
    "carrot",
    "celery",
    "cauliflower",
    "kale",
    "kangkong"
);

$liqWaste = array(
    "fish oil",
    "meat fat",
    "coffee",
    "grease",
    "cooking oil",
    "soups"
);


if ($xdate == $today){
    $wasteType = "Spoiled and Unusable";
} else if ($xdate != $today) {
if (empty($wasteType)) {
    if(in_array($item, $rindPeelShell)){
        $wasteType = "Rinds, Peels, and Shells";
    } 
    else if(in_array($item, $meatBones)){
        $wasteType = "Meat and Bones";
    } 
    else if(in_array($item, $seedNut)){
        $wasteType = "Seeds and Nuts";
    } 
    else if(in_array($item, $stemLeafScrap)){
        $wasteType = "Stems, Leaves, and Plant Scraps";
    } 
    else if(in_array($item, $liqWaste)){
        $wasteType = "Liquid Waste";
    }  
} else {
    $wasteType = $_POST["wasteType"];
}
}

switch($wasteType){
    case "Rinds, Peels, and Shells":
        $contact = "Philippine Food Bank Foundation Inc.";
        break;
    case "Meat and Bones":
        $contact = "Avilon Zoo";
        break;
    case "Seeds and Nuts":
        $contact = "Global Seed Savers PH";
        break;
    case "Stems, Leaves, and Plant Scraps":
        $contact = "Philippine Food Bank Foundation Inc.";
        break;
    case "Liquid Waste":
        $contact = "All Waste Services, Inc.";
        break;
    case "Spoiled and Unusable":
        $contact = "Green Space";
        break;  
}

// Insert data into the "waste" table
$sql = "INSERT INTO waste (item, weight, wasteType, xdate, contact) 
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