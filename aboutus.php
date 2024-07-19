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
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href='logout.php'>Logout</a></li>
        </ul>
    </nav>
</header>
<div class="container">
    
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
function openupdate() {
  window.open("update.php", "_blank");
}
function opendelete() {
  window.open("delete.php", "_blank");
}
function openretrive() {
  window.open("retrive.php", "_blank");
}
</script>