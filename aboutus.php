<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Website Demonstration</title>
    <link rel="stylesheet" href="Style/aboutus.css">
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
  
    <div class="sub-container">
      <div class="sub-container content">
          Hi there 
          Thinking of something else<br>
          Maybe we can do something else 
      </div>
      <img src="Style/profile-pic.png" alt="Profile Picture" width="200">
    </div>  
    <div class="sub-container user" id="user-comment">
      <img src="Style/user.jpeg" alt="Profile Picture" width="200">
      <div class="sub-container content" id="comment">
        
      </div>
    </div>
    <form action="" method="post" id="form">
      <input type="textarea" id="comm" require><br><br>
      <input type="submit" value="Add comment">
    </form>
</div>
<footer>
    <p>&copy; Student Management System</p>
</footer>

<script>
    // Get the form and the div element
  const form = document.getElementById('form');
  const displayDiv = document.getElementById('comment');

  // Add an event listener to the form's submit event
  form.addEventListener('submit', (e) => {
    // Prevent the form from submitting
    e.preventDefault();

    // Get the values from the form fields
    const usercomm = document.getElementById('comm').value;
      usercomm;
    // Create a string to display the values
    const displayText = usercomm;

    // Set the text content of the div element to the display string
    displayDiv.textContent = displayText;
    displayDiv.style.display = "block";
  });

</script>

</body>
</html>
