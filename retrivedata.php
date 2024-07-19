<?php
// Connect to the database
require_once "config.php";

// Retrieve the roll no from the POST request
$rollno = $_POST['rollno'];

// Query to retrieve the student data
$query = "SELECT * FROM studentdetails WHERE rollno = '$rollno'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: ". mysqli_error($conn));
}

// Fetch the data
$data = mysqli_fetch_assoc($result);

// Check if a row was found
if ($data) {
    // Output the data in JSON format
    echo json_encode($data);
} else {
    echo json_encode(array('error' => 'No student found with roll no '. $rollno));
}

// Close the connection
mysqli_close($conn);
?>