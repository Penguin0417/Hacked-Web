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
            <li><a href="#">Student info</a></li>
            <li><a href="#">Courses</a></li>
            <li><a href="#">Announcement</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
    </nav>
</header>
<div class="container">
    <h2>Retrive Student</h2>
    <ul>
        <div class="container">
            <li><a href="sql_injection.php">SQL Injection</a></li>
        </div>
        <div class="container">
            <li><a href="xss.php">Cross-Site Scripting (XSS)</a></li>
        </div>
        <div class="container">
            <li><a href="csrf.php">Cross-Site Request Forgery (CSRF)</a></li>
        </div>
    </ul>
</div>
<footer>
    <p>&copy; Student Management System</p>
</footer>
</body>
</html>