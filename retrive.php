<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Website Demonstration</title>
    <link rel="stylesheet" href="Style/retrive.css">
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
    <h2>Retrive Student</h2>
    <p>Write roll no to show it details: </p>
    <form id="myForm" action="" method="post">
        <p>
            Roll No: *<input type="text" id="userrollno" name="rollno" placeholder="Type Your Roll No">
        </p>
        <input type="submit" value="Retrive">
    </form>
    <br>
    <div id="table-container"></div>
</div>
<footer>
    <p>&copy; Student Management System</p>
</footer>
</body>
</html>

<script>
    // Get the form element
    var form = document.getElementById("myForm");

    // Add an event listener to the form submission
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // prevent default form submission behavior

        // Check if the form is valid
        if (document.getElementById("userrollno").value !== "") {
            fetchData();
        } else {
            alert("Please enter a roll no.");
        }
    });

    // Create a function to fetch the data from the PHP server
    function fetchData() {
        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Set the request method and URL
        xhr.open("POST", "retrivedata.php", true);

        // Set the request headers
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Send the request with the roll no as a parameter
        xhr.send("rollno=" + document.getElementById("userrollno").value);

        // Handle the response
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Parse the JSON data
                var data = JSON.parse(xhr.responseText);

                // Create a table element
                var table = document.createElement("table");
                table.border = "1";

                // Create a table header row
                var headerRow = document.createElement("tr");
                headerRow.innerHTML = "<th>roll no</th><th>student name</th><th>Gender</th><th>dob</th><th>email id</th><th>branch</th><th>phone no</th>";
                table.appendChild(headerRow);

                // Create table rows and cells
                if (data) {
                    var row = document.createElement("tr");
                    row.innerHTML = "<td>" + data.rollno + "</td><td>" + data.uname + "</td><td>" + data.gender + "</td><td>" + data.dob + "</td><td>" + data.emailid + "</td><td>" + data.branch + "</td><td>" + data.phoneno + "</td>";
                    table.appendChild(row);
                } else {
                    var row = document.createElement("tr");
                    row.innerHTML = "<td colspan='7'>No student found with this roll no.</td>";
                    table.appendChild(row);
                }

                // Add the table to the HTML page
                document.getElementById("table-container").innerHTML = ""; // clear the container
                document.getElementById("table-container").appendChild(table);
            } else {
                console.error("Error fetching data:", xhr.statusText);
            }
        }
    }
</script>