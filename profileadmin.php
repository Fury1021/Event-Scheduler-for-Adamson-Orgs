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

// Initialize variables
$orgname = $email = $password = $contact = $facebook = $twitter = $instagram = "";

// Check if the email is set in the session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Select data for the logged-in user from the login table
    $sql = "SELECT orgname, email, password, contact, facebook, twitter, instagram FROM $table_name WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $orgname = $row['orgname'];
        $email = $row['email'];
        $password = $row['password'];
        $contact = $row['contact'];
        $facebook = $row['facebook'];
        $twitter = $row['twitter'];
        $instagram = $row['instagram'];
    } else {
        echo "User not found in the database.";
        exit;
    }
} else {
    echo "Session not set. User not logged in.";
    exit;
}

// Close the database connection
$conn->close();
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="icon" href="favicon.png" type="image">
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

    <div class="column-50">
        <div class="contentcontainer">
            <h1>BASIC INFORMATION</h1>
            <form method="post" action="updateprofileadmin.php"> <!-- Add the form element with action to update_profile.php -->
                <table class="t1">
                    <tr>
                        <td>ORGANIZATION NAME</td>
                        <td><input type="text" name="orgname" value="<?php echo $orgname; ?>"></td>
                    </tr>

                    <tr>
                        <td>EMAIL ADDRESS</td>
                        <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
                    </tr>

                    <tr>
                        <td>PASSWORD</td>
                        <td><a href="changepassword.php" class="change">Change Password</a></td>
                    </tr>
                </table>

                <h1><br><br>CONTACT INFORMATION</h1>
                <table class="t2">
                    <tr>
                        <td>CONTACT NO.</td>
                        <td><input type="text" name="contact" value="<?php echo $contact; ?>"></td>
                    </tr>

                    <tr>
                        <td>FACEBOOK</td>
                        <td><input type="text" name="facebook" value="<?php echo $facebook; ?>"></td>
                    </tr>

                    <tr>
                        <td>TWITTER</td>
                        <td><input type="text" name="twitter" value="<?php echo $twitter; ?>"></td>
                    </tr>

                    <tr>
                        <td>INSTAGRAM</td>
                        <td><input type="text" name="instagram" value="<?php echo $instagram; ?>"></td>
                    </tr>

                </table>
                <input type="submit" class="change" value="Update Profile"> 
            </form>
            <br>
        </div>
    </div>

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
