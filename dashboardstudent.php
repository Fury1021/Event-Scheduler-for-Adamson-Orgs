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

// Select the 5 most recent images from the admin table, ordered by timestamp in descending order
// Replace 'date_created' with the correct column name, for example, 'date'
$sql = "SELECT * FROM events ORDER BY date DESC LIMIT 10"; 
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
            	<form action="dashboardstudent.php" method="GET">
                <input type="text" name="q" placeholder="Search...">
                <button type="submit">Search</button>
            	</form>
       		 </div>
       		 <div class="about">
           		 <a href="aboutstudent.php"><h2>ABOUT</h2></a>
        	</div>
    	</div>
    </div>
	
	<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="profilestudent.php">Profile</a>
                    <a href="dashboardstudent.php">Dashboard</a>
                    <a href="viewevents.php">View&nbsp;Events</a>
                    <a href="loginstudent.php">Logout</a>
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
                <div class="dashboard-buttons">
                <button onclick="location.href='viewevents.php'">View the Events Classmate!</button>
                <button onclick="location.href='profilestudent.php'">Check your Account Classmate!</button>
                </div>  
                <!-- Your existing content -->
            </div>
        </div>

    <!-- Your existing HTML content -->
    <script src="dashboard.js"></script>
</body>
</html>
