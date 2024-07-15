<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Website Demonstration</title>
    <link rel="stylesheet" href="Style/add.css">
</head>
<body>
<header>
    <h1>Student Management System</h1>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="#">Student info</a></li>
            <li><a href="#">Courses</a></li>
            <li><a href="#">Announcement</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
    </nav>
</header>
<div class="container">
    <h2>ADD STUDENT </h2>
    <h3>Fill the details to add student: </h3>
    <form class="containeer" action="" method="post">
        <h1>Registeration Form</h1>
        <h2>Contact Information</h2>
        <p>
            Name: *<input type="text" name="realname" placeholder="Type Your Name.." required>
        </p>
        <p>
            Roll No: *<input type="text" name="rollno" placeholder="Type Your Roll No" required>
        </p>
        <p>
            DOB: *<input type="date" id="dob" name="dob" required>
        </p>
        <!-- <fieldset>
            <legend>Gender *</legend>
            <p>
                <input type="radio" name="gender" id="male" required> Male 
                <input type="radio" name="gender" id="female" required>Female
            </p>
        </fieldset> -->
        <p>
            Branch *<input type="text" name="branch" id="branch" placeholder="Write Your Branch" required>
        </p>
        <p>
            Email: *<input type="email" name="emailid" id="emailid" placeholder="Type Your Email" required>
        </p>
        <p>
            Mobile No: *<input type="number" name="phoneno" placeholder="Type Your Phone number" required>
        </p>
        <hr>
        <input type="submit" value="Register">
    </form>
</div>
<footer>
    <p>&copy; Student Management System</p>
</footer>
</body>
</html>

<?php
require_once "config.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO studentdetails (rollno, uname, dob, emailid, branch, phoneno) VALUES (?,?,?,?,?,?)";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssi", $param_rollno, $param_uname, $param_dob, $param_emailid, $param_branch, $param_phoneno);

        // Set these parameters
        $param_rollno = trim($_POST['rollno']);
        $param_uname = trim($_POST['realname']);
        $param_dob = trim($_POST['dob']);
        $param_emailid = trim($_POST["emailid"]);
        $param_branch = trim($_POST["branch"]);
        $param_phoneno = trim($_POST["phoneno"]);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt)) {
            // No output before the header()
            header('Location: add.php');
            echo "<script>alert('You have successfully logged out!');</script>";
            exit; // Stop executing the script to prevent further output
        } else {
            $error = mysqli_stmt_error($stmt);
            echo "Something went wrong: $error";
        }
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>