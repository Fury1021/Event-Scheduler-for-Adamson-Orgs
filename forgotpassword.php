<?php
// Database connection details
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "eventscheduler";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username from the form if it is set
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $newPassword = $_POST['new_password'];

    // Check if the username exists in the admin table
    $check_username_query = "SELECT * FROM admin WHERE username = '$username'";
    $result = $conn->query($check_username_query);

    if ($result->num_rows > 0) {
        // Username found, redirect to change password form
        $sql = "UPDATE admin SET password = '$newPassword' WHERE username = '$username'";
        $result = $conn->query($sql);
        $message = "Password changed successfully!";
    } else {
        // Username not found
        $message = "Username not found. Please enter a valid username.";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="icon" href="favicon.png" type="image">
    <link rel="stylesheet" href="forgotpass.css">

</head>
<body>
<h2 class="logo1">admin</h2>
<div class="container">
    <h2>Forgot Password</h2>
    <!-- Display a message if the username is not found or if the password change was successful -->
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <!-- Forgot Password Form -->
    <form method="post" action="">
        <label for="username">Please enter your username to search for your account.</label><br><br>
        <input type="text" placeholder="Username" id="username" name="username" required><br><br>
        <label for="new_password">Please enter your new password.</label><br><br>
        <input type="password" placeholder="Password" id="new_password" name="new_password" required><br><br>
        <input type="submit" value="Change Password">
    </form>
    <a href="loginadmin.php">Login</a>
	<br>
</div>

</body>
</html>
