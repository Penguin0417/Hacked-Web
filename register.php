<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTERATION</title>
    <link rel="stylesheet" href="Style/register.css">
</head>
<body>
    <form class="containeer" action="" method="post">
        <h1>Registeration Form</h1>
        <h2>Contact Information</h2>
        <p>
            Name: *<input type="text" name="realname" placeholder="Type Your Name.." required>
        </p>
        <p>
            Roll No: *<input type="text" name="rollno" placeholder="Type Your Roll No" required>
        </p>
        <!-- <fieldset>
            <legend>Gender *</legend>
            <p>
                <input type="radio" name="gender" id="male" required> Male <input type="radio" name="gender" id="female" required>Female
            </p>
        </fieldset> -->

        <p>
            Email: *<input type="email" name="emailid" id="emailid" placeholder="Type Your Email" required>
        </p>
        <p>
            Mobile No: *<input type="number" name="phoneno" placeholder="Type Your Phone number" required>
        </p>
        <p>
            Username *<input type="text" name="username" placeholder="Type Your Username.." required>
        </p>
        
        <p>
            Password *<input type="password" name="password" id="password" placeholder="Type Your Password" required>
        </p>
        <p>
            Confirm Password *<input type="password" name="confirm_password" id="password" placeholder="Type Your Password" required>
        </p>
        <hr>
        <input type="submit" value="Register">
    </form>
    <footer>
        <p>&copy; Student Management System</p>
    </footer>
</body>
</html>

<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Username cannot be blank";
    } else {
        $sql = "SELECT id FROM users Where username =?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This user is already taken";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo "Something went wrong";
            }
        }
        mysqli_stmt_close($stmt);
    }

    // Check for password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank....";
    } elseif (strlen(trim($_POST['password'])) < 7) {
        $password_err = "Password cannot be less than 7 characters.";
    } else {
        $password = trim($_POST['password']);
    }

    // Check for confirm password field
    if (empty(trim($_POST['confirm_password'])) || trim($_POST['confirm_password'])!= trim($_POST['password'])) {
        $confirm_password_err = "Password should match..";
    } else {
        $confirm_password = trim($_POST['confirm_password']);
    }

    // If there were no errors, go ahead and insert into the database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO users (rollno, username, password, phoneno, emailid) VALUES (?,?, ? ,?,?)";

        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssis", $param_rollno, $param_username, $param_password, $param_phoneno, $param_emailid);

            // Set these parameters
            $param_username = $username;
            $param_password = $password;
            $param_emailid = trim($_POST["emailid"]);
            $param_phoneno = trim($_POST["phoneno"]);
            $param_rollno = trim($_POST["rollno"]);

            // Try to execute the query
            if (mysqli_stmt_execute($stmt)) {
                ?>
            <script>
                alert('User added Successfully');
                window.location.href = 'login.php'; 
            </script>
            <?php
            } else {
                $error = mysqli_stmt_error($stmt);
                echo "Something went wrong: $error";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>




<!-- password_hash($password,PASSWORD_DEFAULT); -->