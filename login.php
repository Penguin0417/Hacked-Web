<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/login.css">
    <title>Login Page</title>
</head>
<body>
    <header>
        <h1>Student Management System</h1>
    </header>
    <br><br>
    <div class="login-container">

        <h1>Login</h1>
        <form action="login.php" method="post">
            <b>Username</b>
            <input type="text" placeholder="Enter Username" name="username" required>
                <br><br>
            <label for="psw"><b>Password</b></label>

            <input type="password" placeholder="Enter Password" name="password">
            <br><br>
            <input type="submit" value="Login" name="login_Btn">
            <br>
        </form>
        <a href="register.php" target="page"><button>New Registeration</button></a>
        
    </div>
    <footer>
        <p>&copy; Student Management System</p>
    </footer>
</body>
</html>

<?php
require_once "config.php";
if(isset($_POST['login_Btn'])){
    $username = $_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM WebsiteLogin.users WHERE username = '$username'";
    $result = mysqli_query($conn,$sql);
    if($row = mysqli_fetch_assoc($result)){
        $resultPassword = $row['password'];
        if($password==$resultPassword){
            header('Location:home.php');
        }else{
            echo '<div class="alert">Login Unsuccesfull</div>';
        }
    }
}
?>
