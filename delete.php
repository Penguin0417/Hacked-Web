<?php
require_once "config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Primary key value to delete
    if (isset($_POST["rollno"])) {
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
            ?>
            <script>
                alert('Entry Deleted Successfully');
                window.location.href = 'delete.html'; // redirect to delete.html
            </script>
            <?php
        } else {
            echo "Error deleting record: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } 
    else {
        echo "No roll no provided";
    }
}
?>