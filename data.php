<?php
//making connection
require_once "config.php";



// SQL query to retrieve data
$sql = "SELECT rollno, uname, dob, emailid, branch, phoneno FROM studentdetails";
$result = $conn->query($sql);

// Check if query is successful
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Create an array to store the data
$data = array();

// Parse the data and store it in the array
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
mysqli_close($conn);
?>
