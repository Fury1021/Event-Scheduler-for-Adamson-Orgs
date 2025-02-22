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

// Initialize variables
$email = $password = $contact = $facebook = "";

// Check if the username is set in the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Select data for the logged-in user from the login table
    $sql = "SELECT email, password, contact, facebook FROM $table_name WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $password = $row['password'];
        $contact = $row['contact'];
        $facebook = $row['facebook'];
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
    <link rel="stylesheet" href="profile.css">
    <title>User Profile</title>
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
    <a href="profilestudent.php">Profile</a>
    <a href="dashboardstudent.php">Dashboard</a>
    <a href="viewevents.php">View&nbsp;Events</a>
    <a href="loginstudent.php">Logout</a>
</div>

<div class="column-50">
    <div class="contentcontainer">
        <h1>BASIC INFORMATION</h1>
        <form method="post" action="updateprofilestudent.php">
            <table class="t1">
                <tr>
                    <td>EMAIL ADDRESS</td>
                    <td><input type="text" name="email" value="<?php echo $email; ?>" required></td>
                </tr>

                <tr>
                    <td>PASSWORD</td>
                    <td><a href="changepasswordstudent.php" class="change">Change Password</a></td>
                </tr>
            </table>

            <h1><br><br>CONTACT INFORMATION</h1>
            <table class="t2">
                <tr>
                    <td>CONTACT NO.</td>
                    <td><input type="text" name="contact" value="<?php echo $contact; ?>" required></td>
                </tr>

                <tr>
                    <td>FACEBOOK</td>
                    <td><input type="text" name="facebook" value="<?php echo $facebook; ?>" required></td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" class="change" value="Update"></td>
                </tr>
            </table>
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
