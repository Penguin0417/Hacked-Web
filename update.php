
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Website Demonstration</title>
    <link rel="stylesheet" href="Style/update.css">
</head>
<body>
<header>
    <h1>Student Management System</h1>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="retrive.php">Student info</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href='logout.php'>Logout</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <h1>Update Entry</h1>
    <h3>Enter the roll no to update that entry:</h3>
    <form id="myForm" action="" method="post">
        <p>
            Roll No: *<input type="text" id="userrollno" name="rollno" placeholder="Type Your Roll No" required>
        </p>
        <button onclick="showform()" id="form-button"> Update </button>
    <div class="form-container", id="form-container">
        <p>
            Name: *<input type="text" name="realname" placeholder="Type Your Name.." required>
        </p>
        <p>
            DOB: *<input type="date" id="dob" name="dob" required>
        </p>
        <fieldset>
            <legend>Gender *</legend>
            <p>
                <input type="radio" name="gender" id="male" value="Male" required> Male 
                <input type="radio" name="gender" id="female" value="Female" required>Female
            </p>
        </fieldset>
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
        <input type="submit" value="Update">
    </div>
    </form>
</div>
<footer>
    <p>&copy; Student Management System</p>
</footer>
</body>
</html>

<?php
// Connect to the database
require_once "config.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve the roll no from the POST request
    $rollno = $_POST['rollno'];
    $realname = $_POST['realname'];
    $dob = $_POST['dob'];
    $branch = $_POST['branch'];
    $emailid = $_POST['emailid'];
    $phoneno = $_POST['phoneno'];
    $gender = $_POST['gender'];
    // Query to retrieve the student data
    $query = "UPDATE studentdetails SET uname='$realname', gender='$gender', dob='$dob',branch='$branch',emailid='$emailid',phoneno='$phoneno'  WHERE rollno = '$rollno'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        die("Query failed: ". mysqli_error($conn));
    }
}

// Close the connection
mysqli_close($conn);
?>

<script>
    function showform(){
                // Get the element you want to modify
        const element = document.getElementById('form-container');
        const button = document.getElementById('form-button');

        // Change the CSS property
        element.style.display = 'block';
        button.style.display = 'none';
    }
</script>