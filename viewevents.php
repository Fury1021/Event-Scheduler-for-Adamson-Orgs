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

// Select all data from the events table
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Events</title>
    <link rel="stylesheet" href="view.css">
    <link rel="icon" href="favicon.png" type="image">

    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.9);
        }

        /* Modal Content */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* The Close Button */
        .close {
            color: #ccc;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 35px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }

        /* Zoomed-in Image */
        .modal-content img {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="icon">
            <span style="font-size:30px;cursor:pointer;color:rgb(13, 184, 236);" onclick="openNav()">&#9776;</span>
            <h2 class="logo1">Org-anizer</h2>
        </div>
        <div class="navigation-links">
            <div class="searchbar">
                <form action="/search" method="GET">
                    <input type="text" name="q" id="searchInput" placeholder="Search..." oninput="searchTable()">
                    <button type="submit">Search</button>
                </form>
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
    
    <div class="viewtitle">
        <h2>View Events</h2>
    </div>

    <table>
        <tr>
            <th>Organization Name</th>
            <th>Activity</th>
            <th>Venue</th>
            <th>Borrowed Chairs</th>
            <th>Borrowed Tables</th>
            <th>Description</th>
            <th>Date</th>
            <th>Image</th>
            <th>Status</th> <!-- Add this line for the Status column -->
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr id='row{$row['eventid']}'>";
                echo "<td>" . $row["orgname"] . "</td>";
                echo "<td>" . $row["activity"] . "</td>";
                echo "<td>" . $row["venue"] . "</td>";
                echo "<td>" . $row["borrowed_chairs"] . "</td>";
                echo "<td>" . $row["borrowed_tables"] . "</td>";    
                echo "<td>" . $row["description"] . "</td>";    
                echo "<td>" . $row["date"] . "</td>";
                // Add a clickable image with the onclick event to open the modal
                echo "<td><img src='uploads/" . basename($row["image"]) . "' alt='Event Image' height='50' width='50' onclick='openModal(\"uploads/" . basename($row["image"]) . "\")'></td>";
                echo "<td>" . $row["status"] . "</td>"; // Add this line for the Status column
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No events found.</td></tr>";
        }
        ?>
    </table>
    
    <!-- The Modal -->
    <div id="myModal" class="modal" onclick="closeModal()">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="img01">
    </div>

    <script src="dashboard.js"></script>
    <script>
        function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.querySelector("table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        // Skip the header row
        if (tr[i].getElementsByTagName("th").length > 0) {
            continue;
        }

        var rowVisible = false;
        td = tr[i].getElementsByTagName("td");

        for (var j = 0; j < td.length; j++) {
            txtValue = td[j].textContent || td[j].innerText;

            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                rowVisible = true;
                break;
            }
        }

        if (rowVisible) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}


        // Function to open the modal and display the clicked image
        function openModal(imgSrc) {
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("img01");

            modal.style.display = "block";
            modalImg.src = imgSrc;
        }

        // Function to close the modal
        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }
    </script>
</body>
</html>
