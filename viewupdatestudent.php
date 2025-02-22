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
    // Retrieve the username and other information from the form
    $username = $_POST['username'];
    $newPassword = $_POST['password'];
    $newContact = $_POST['contact'];
    $newFacebook = $_POST['facebook'];

    // Update the information in the users table
    $sql = "UPDATE users SET password = '$newPassword', contact = '$newContact', facebook = '$newFacebook' WHERE username = '$username'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Redirect to viewstudents.php if the update was successful
        header("Location: viewstudent.php");
        exit();
    } else {
        // Provide an error message
        echo "Error updating student information: " . $conn->error;
    }
} else {
    // Redirect to viewstudents.php if the form is not submitted
    header("Location: viewstudent.php");
    exit();
}

// Close the database connection
$conn->close();
?>
