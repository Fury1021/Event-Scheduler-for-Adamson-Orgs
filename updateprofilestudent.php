<?php
session_start();

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "eventscheduler";
$table_name = "users";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username from the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Process the POST data for updating email, contact, and facebook
    if (isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['facebook'])) {
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $facebook = $_POST['facebook'];

        $sql = "UPDATE $table_name SET email = '$email', contact = '$contact', facebook = '$facebook' WHERE username = '$username'";
        $conn->query($sql);
    }
}

// Close the database connection
$conn->close();

// Redirect back to the profile page after the update
header("Location: profilestudent.php");
exit();
?>
