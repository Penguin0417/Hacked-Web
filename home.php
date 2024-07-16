<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerable Website Demonstration</title>
    <link rel="stylesheet" href="Style/home.css">
</head>
<body>
<header>
    <h1>Student Management System</h1>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="retrive.php">Student info</a></li>
            <li><a href="#">About Us</a></li>
            <li><a class="left" href='logout.php'>Logout</a></li>
        </ul>
    </nav>
</header>
<div class="container">
    <h2>Welcome to Student Management System </h2>
    <h3>Select what do you want to do:</h3>
    <ul>
        <div class="sub-container" onclick="openadd()">
            <li><a href="add.php">Add Student</a></li>
        </div>
        <div class="sub-container" onclick="opendelete()">
            <li><a href="delete.php">Delete Student</a></li>
        </div>
        <div class="sub-container" onclick="openretrive()">
            <li><a href="retrive.php">Retrieve Data</a></li>
        </div>
    </ul>
</div>
<footer>
    <p>&copy; Student Management System</p>
</footer>
</body>
</html>
<script>
function openadd() {
  window.open("add.php", "_blank");
}
function opendelete() {
  window.open("delete.php", "_blank");
}
function openretrive() {
  window.open("retrive.php", "_blank");
}
</script>