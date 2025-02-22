<!DOCTYPE html>
<html>
<head>
    <title>Create Acc Form</title>
    <link rel="stylesheet" href="create.css">
    <link rel="icon" href="favicon.png" type="image">
</head>
<body>
<h2 class="logo1">Org-anizer</h2>
<div class="container">
    <div class="head">Create a new account</div>
	<div class="subhead">It's quick and easy.</div>
    <form action="createadmin.php" method="POST">
        <input type="text" placeholder="Username" id="username" name="username" required><br>

        <input type="password" placeholder="Password" id="password" name="password" required><br>

        <!-- New fields -->
        <input type="text" placeholder="Organization Name" id="orgname" name="orgname"><br>
		
        <input type="email" placeholder="Email" id="email" name="email"><br>
		
        <input type="tel" placeholder="Contact" id="contact" name="contact"><br>

        <input type="text" placeholder="Facebook" id="facebook" name="facebook"><br>

        <input type="text" placeholder="Twitter" id="twitter" name="twitter"><br>

        <input type="text" placeholder="Instagram" id="instagram" name="instagram"><br>

        <input type="submit"  value="Create Account">
		
    </form>
	<a href="loginadmin.php"><center>Already have an account?</center></a>
</div>
<br><br><br><br><br><br><br><br>
</body>
</html>

<?php
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
    // Retrieve the form data
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $orgname = isset($_POST['orgname']) ? $_POST['orgname'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $contact = isset($_POST['contact']) ? $_POST['contact'] : "";
    $facebook = isset($_POST['facebook']) ? $_POST['facebook'] : "";
    $twitter = isset($_POST['twitter']) ? $_POST['twitter'] : "";
    $instagram = isset($_POST['instagram']) ? $_POST['instagram'] : "";

    // Insert the data into the login table
    $sql = "INSERT INTO $table_name (username, password, orgname, email, contact, facebook, twitter, instagram) 
            VALUES ('$username', '$password', '$orgname', '$email', '$contact', '$facebook', '$twitter', '$instagram')";

    // Execute the SQL query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Retrieve the last inserted ID (adminid)
        $lastInsertedId = mysqli_insert_id($conn);

        echo "Account created successfully!";

        // Store $lastInsertedId for use in the next page
        // You can use sessions, cookies, or other methods to pass this value to the next page
        // For example, using sessions:
        session_start();
        $_SESSION['adminid'] = $lastInsertedId;

        // Redirect to the next page
        header("Location: loginadmin.php");
    } else {
        echo "Error creating account: " . mysqli_error($conn);
    }
} else {
    // If the form is not submitted, provide a message or redirect as needed
    echo "Form not submitted.";
}

// Close the database connection
$conn->close();
?>
