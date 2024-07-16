<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Website Demonstration</title>
    <link rel="stylesheet" href="Style/delete.css">
</head>
<body>
<header>
    <h1>Student Management System</h1>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="#">Student info</a></li>
            <li><a href="#">Courses</a></li>
        </ul>
    </nav>
</header>
<div class="container">
    <h1>Delete Entry</h1>
    <h3>Enter the roll no to delete that entry:</h3>
    <form class="containeer" action="delete.php" method="post">
        <p>
            Roll No: *<input type="text" name="rollno" placeholder="Type Your Roll No" required>
        </p>
        <button>
            <input type="submit" value="Delete">
        </button>
    </form>
</div>
<footer>
    <p>&copy; Student Management System</p>
</footer>
</body>
</html>

<?php
require_once "config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Primary key value to delete
$primary_key_value = trim($_POST["rollno"]); // Replace with the actual primary key value

// Table name
$table_name = 'studentdetails'; // Replace with the actual table name

// Primary key column name
$primary_key_column = 'rollno'; // Replace with the actual primary key column name

// Delete query
$query = "DELETE FROM $table_name WHERE $primary_key_column = ?";

// Prepare statement
$stmt = $conn->prepare($query);

// Bind parameter
$stmt->bind_param("s", $primary_key_value);

// Execute query
if ($stmt->execute()) {
    echo "<script>
        alert('Entry Deleted Successfully');
            </script>";
} else {
    echo "Error deleting record: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>