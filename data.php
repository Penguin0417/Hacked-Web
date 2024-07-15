<?php
//making connection
require_once "config.php";



// SQL query to retrieve data
$sql = "SELECT username, rollno, emailid, phoneno FROM users";
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

// Retrieve the data
// $sql = "SELECT * FROM users";
// $result = mysqli_query($conn, $sql);
// echo "<table>";
// echo "<tr><th>Username</th><th>Roll No</th><th>Score</th><th>Articles</th></tr>";
// while($row = mysqli_fetch_assoc($result)) {
//   echo "<tr>";
//   echo "<td>" . $row["username"] . "</td>";
//   echo "<td>" . $row["rollno"] . "</td>";
//   echo "<td>" . $row["phoneno"] . "</td>";
//   echo "<td>" . $row["emailid"] . "</td>";
//   echo "</tr>";
// }
// echo "</table>";

mysqli_close($conn);
?>
