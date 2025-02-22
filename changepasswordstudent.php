<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: loginstudent.php");
    exit();
}

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
    // Retrieve the current username from the session
    $username = $_SESSION['username'];

    // Retrieve old and new passwords from the form
    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];

    // Verify the old password
    $verifySql = "SELECT password FROM users WHERE username = '$username'";
    $verifyResult = $conn->query($verifySql);

    if ($verifyResult) {
        // Check if the query returned any results
        if ($verifyResult->num_rows > 0) {
            $row = $verifyResult->fetch_assoc();
            $storedPassword = $row['password'];

            // Check if the old password matches the stored password
            if ($oldPassword == $storedPassword) {
                // Update the password in the database
                $updateSql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
                $updateResult = $conn->query($updateSql);

                // Check if the query was successful
                if ($updateResult) {
                    // Provide a message indicating a successful password change
                    $message = "Password changed successfully!";
                } else {
                    // Provide an error message
                    $message = "Error changing password. Please try again.";
                }
            } else {
                // Provide an error message for incorrect old password
                $message = "Incorrect old password. Please try again.";
            }
        } else {
            // Provide an error message for no results found
            $message = "Error verifying old password. User not found.";
        }
    } else {
        // Provide an error message for database query failure
        $message = "Error verifying old password. Please try again.";
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
    <title>Change Password</title>
    <link rel="icon" href="favicon.png" type="image">
    <link rel="stylesheet" href="changepass.css">

</head>
<body>
<h2 class="logo1">Org-anizer</h2>
<div class="container">
    <h2>Change Password</h2>
    <!-- Display a message if the password change was successful or failed -->
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <!-- Change Password Form -->
    <form method="post" action="">
        <label for="old_password">Old Password:</label>
        <input type="password" id="old_password" name="old_password" required><br><br>
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required><br><br>
        <input type="submit" value="Change Password">
    </form>
    <a href="profilestudent.php">Back</a>
</div>
</body>
</html>
