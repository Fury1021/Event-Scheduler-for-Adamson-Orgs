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

// Retrieve adminid from the session
$adminid = isset($_SESSION['adminid']) ? $_SESSION['adminid'] : 0;

// Select the 5 most recent images from the events table for the logged-in admin, ordered by timestamp in descending order
$sql = "SELECT * FROM events WHERE adminid = '$adminid' ORDER BY date DESC LIMIT 5";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="icon" href="favicon.png" type="image">

	
</head>
<body>
    <!---navigation & searchbar-->
    <div class="navbar">
        <div class="icon">
			<span style="font-size:30px;cursor:pointer;color:rgb(13, 184, 236);" onclick="openNav()">&#9776;</span>
            <h2 class="logo1">Org-anizer</h2>
        </div>
        <div class="navigation-links">
        	<div class="searchbar">
            	<form action="/search" method="GET">
                <input type="text" name="q" placeholder="Search...">
                <button type="submit">Search</button>
            	</form>
       		 </div>
       		 <div class="about">
           		 <a href="about.php"><h2>ABOUT</h2></a>
        	</div>
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
	
        <!---content-->
        <div class="column-50">
            <div class="contentcontainer">
                <!-- Your existing content -->

                <h1>Recent Events</h1>
                <div id="carousel-container">
                    <ul id="carousel">
                        <?php
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            $imageSrc = isset($row["image_filename"]) ? 'uploads/' . $row["image_filename"] : 'path_to_placeholder_image.jpg'; // Adjust the placeholder image path and extension.
                            echo "<td><img src='uploads/" . basename($row["image"]) . "' alt='Event Image' height='50' width='50'></td>";
                          }

                        } else {
                            // Placeholder images or a message if no events found
                            for ($i = 1; $i <= 5; $i++) {
                                echo "<li><img src='\Prototypedatabase\uploads$i.jpg' alt='Placeholder Image $i'></li>";
                            }
                        }
                        ?>
                    </ul>
                    <button id="prev-button">Prev</button>
                    <button id="next-button">Next</button>
                </div>
                <div class="dashboard-buttons" style="margin-top: 15px;">
                <button onclick="location.href='createevent.php'">Create your Event Classmate!</button>
                <button onclick="location.href='report.php'">View your Events Classmate!</button>
                <button onclick="location.href='profileadmin.php'">Check your Account Classmate!</button>
                </div>

                <!-- Your existing content -->
            </div>
        </div>

    <!-- Your existing HTML content -->
    <script src="dashboard.js"></script>
</body>
</html>
