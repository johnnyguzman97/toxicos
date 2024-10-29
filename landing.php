<?php
session_start();
include('server/connection.php'); // Adjust path if necessary

// Handle login
if (isset($_POST['login_submit'])) {
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    // Check login credentials in the database
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $login_error = "Invalid username or password.";
    }
}

// Handle registration
if (isset($_POST['register_submit'])) {
    $username = $_POST['register_username'];
    $password = $_POST['register_password'];

    // Insert new user into the database
    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $query)) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $register_error = "Failed to register. Try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to ToxicWear</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>

<!-- Background Image and Welcome Text -->
<div class="landing-background">
    <h1 class="welcome-text">Welcome to Chicos Toxicos</h1>
</div>

<!-- Login/Register Form Container -->
<div class="login-register-container">
    <!-- Navigation Buttons -->
    <div class="form-buttons">
        <button onclick="showLogin()" class="login-button">Log In</button>
        <button onclick="showRegister()" class="register-button">Register</button>
    </div>

    <!-- Login Form -->
    <div id="loginForm" style="display: none;">
        <form method="post" action="landing.php">
            <h2>Log In</h2>
            <input type="text" name="login_username" placeholder="Username" required>
            <input type="password" name="login_password" placeholder="Password" required>
            <button type="submit" name="login_submit">Log In</button>
            <?php if (isset($login_error)) echo "<p>$login_error</p>"; ?>
        </form>
    </div>

    <!-- Register Form -->
    <div id="registerForm" style="display: none;">
        <form method="post" action="landing.php">
            <h2>Register</h2>
            <input type="text" name="register_username" placeholder="Username" required>
            <input type="password" name="register_password" placeholder="Password" required>
            <button type="submit" name="register_submit">Register</button>
            <?php if (isset($register_error)) echo "<p>$register_error</p>"; ?>
        </form>
    </div>
</div>

<script>
    function showLogin() {
        document.getElementById('loginForm').style.display = 'block';
        document.getElementById('registerForm').style.display = 'none';
    }

    function showRegister() {
        document.getElementById('loginForm').style.display = 'none';
        document.getElementById('registerForm').style.display = 'block';
    }
</script>

</body>
</html>
