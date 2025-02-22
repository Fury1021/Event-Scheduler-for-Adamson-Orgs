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

// Check if the eventid is provided in the URL
if (isset($_GET['eventid'])) {
    $eventid = $_GET['eventid'];

    // Delete the event from the database
    $sql = "DELETE FROM events WHERE eventid = $eventid";
    if ($conn->query($sql) === TRUE) {
        echo "Event deleted successfully.";
        header("Location:report.php");
    } else {
        echo "Error deleting event: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Event ID not provided.";
}
?>
