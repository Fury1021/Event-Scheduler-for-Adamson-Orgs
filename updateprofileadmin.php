<?php
session_start();

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "eventscheduler";
$table_name = "admin";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the values from the form
    $orgname = $_POST['orgname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];

    // Check if the username is set in the session
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        // Update the data in the database
        $sql = "UPDATE $table_name SET
                orgname = '$orgname',
                email = '$email',
                contact = '$contact',
                facebook = '$facebook',
                twitter = '$twitter',
                instagram = '$instagram'
                WHERE email = '$email'";

        if ($conn->query($sql) === TRUE) {
            echo "Profile updated successfully!";
            header('Location:  profileadmin.php');
        } else {
            echo "Error updating profile: " . $conn->error;
        }
    } else {
        echo "Session not set. User not logged in.";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
