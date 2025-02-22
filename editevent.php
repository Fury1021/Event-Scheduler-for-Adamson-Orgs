<?php
// Check if the eventid parameter is set
if (isset($_GET['eventid'])) {
    $eventid = $_GET['eventid'];

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

    // Select event data based on eventid
    $sql = "SELECT * FROM events WHERE eventid = $eventid";
    $result = $conn->query($sql);

    // Close the database connection
    $conn->close();
} else {
    // Redirect to view_events.php if eventid is not set
    header("Location: viewevents.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="icon" href="favicon.png" type="image">
    <link rel="stylesheet" href="event.css">
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

    <h2>Edit Event</h2>

    <?php
    // Check if event data is found
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>
    <form action="updateevent.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="eventid" value="<?php echo $row['eventid']; ?>">

        <label for="orgname">Organization Name:</label>
        <input type="text" id="orgname" name="orgname" value="<?php echo $row['orgname']; ?>" required>
        <br>

        <label for="activity">Activity:</label>
        <input type="text" id="activity" name="activity" value="<?php echo $row['activity']; ?>" required>
        <br>

        <label for="venue">Venue:</label>
        <input type="text" id="venue" name="venue" value="<?php echo $row['venue']; ?>" required>
        <br>

        <label for="borrowed_chairs">Borrowed Chairs:</label>
        <input type="text" id="borrowed_chairs" name="borrowed_chairs" value="<?php echo $row['borrowed_chairs']; ?>" required>
        <br>

        <label for="borrowed_tables">Borrowed Tables:</label>
        <input type="text" id="borrowed_tables" name="borrowed_tables" value="<?php echo $row['borrowed_tables']; ?>" required>
        <br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required><?php echo $row['description']; ?></textarea>
        <br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" value="<?php echo $row['date']; ?>" required>
        <br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="upcoming" <?php echo ($row['status'] == 'upcoming') ? 'selected' : ''; ?>>Upcoming</option>
            <option value="done" <?php echo ($row['status'] == 'done') ? 'selected' : ''; ?>>Done</option>
            <option value="cancelled" <?php echo ($row['status'] == 'cancelled') ? 'selected' : ''; ?>>Cancelled</option>
        </select>
        <br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image">
        <br>

        <img src="uploads/<?php echo basename($row['image']); ?>" alt="Current Event Image" height="50" width="50">
        <br>

        <input type="submit" value="Save Changes">
    </form>
    <?php
    } else {
        echo "Event not found.";
    }
    ?>

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
