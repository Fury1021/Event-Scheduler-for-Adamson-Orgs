<?php
session_start();

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

$message = "";  // Variable to store success or error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orgname = $_POST['orgname'];
    $activity = $_POST['activity'];
    $venue = $_POST['venue'];
    $borrowed_chairs = $_POST['borrowed_chairs'];
    $borrowed_tables = $_POST['borrowed_tables'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    // Retrieve adminid from the session
    $adminid = isset($_SESSION['adminid']) ? $_SESSION['adminid'] : 0;

    // Handle image upload
    $uploadDirectory = __DIR__ . "/uploads/";
    $image_path = $uploadDirectory . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_path)) {
        // Insert data into the events table with status set to 'upcoming'
        $sql = "INSERT INTO events (adminid, orgname, activity, venue, borrowed_chairs, borrowed_tables, description, date, image, status) VALUES ('$adminid', '$orgname', '$activity', '$venue', $borrowed_chairs, $borrowed_tables, '$description', '$date', '$image_path', 'upcoming')";

        if ($conn->query($sql) === TRUE) {
            $message = '<p class="success-message">Event created successfully!</p>';
        } else {
            $message = '<p class="error-message">Error creating event: ' . $conn->error . '</p>';
        }
    } else {
        $message = '<p class="error-message">File upload error: ' . $_FILES["image"]["error"] . '</p>';
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
    <link rel="icon" href="favicon.png" type="image">
    <link rel="stylesheet" href="event.css">

    <title>Create Event</title>
</head>
<body>
    <div class="navbar">
        <div class="icon">
            <span style="font-size:30px;cursor:pointer;color:rgb(13, 184, 236);" onclick="openNav()">&#9776;</span>
            <h2 class="logo1">Org-anizer</h2>
        </div>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="profileadmin.php">Profile</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="createevent.php">Create&nbsp;Event</a>
        <a href="inventoryform.php">Inventory</a>
        <a href="report.php">View&nbsp;Reports</a>
        <a href="loginadmin.php">Logout</a>
    </div>

    <h2>Create Event</h2>

    <?php echo $message; ?> <!-- Display success or error message here -->

    <form method="post" action="createevent.php" enctype="multipart/form-data">
        <label for="orgname">Organization Name:</label>
        <input type="text" id="orgname" name="orgname" required><br>

        <label for="activity">Activity:</label>
        <input type="text" id="activity" name="activity" required><br>

        <label for="venue">Venue:</label>
        <input type="text" id="venue" name="venue" required><br>

        <label for="borrowed_chairs">Borrowed Chairs:</label>
        <input type="number" id="borrowed_chairs" name="borrowed_chairs" required><br>

        <label for="borrowed_tables">Borrowed Tables:</label>
        <input type="number" id="borrowed_tables" name="borrowed_tables" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*"><br>

        <input type="submit" value="Create Event">
    </form>

    

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {   
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>
</html>
