<!DOCTYPE html>
<html>
<head>
    <title>User/Admin Selection</title>
    <link rel="icon" href="favicon.png" type="image">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1F2833;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
        }

        form {
            margin: 20px;
        }

        button {
            padding: 10px 15px;
            font-size: 16px;
            margin: 5px;
            cursor: pointer;
        }

        /* Style for user button */
        button[value="user"] {
            background-color: #4CAF50;
            color: white;
            border: none;
        }

        /* Style for admin button */
        button[value="admin"] {
            background-color: #008CBA;
            color: white;
            border: none;
        }

        /* Hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }
		
		.container {
			display: block;
			width: 400px;
            margin: 350px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
			text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
		
		.logo1 {
		  font-size: 30px;
		  color: rgb(13, 184, 236);
		  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
    </style>
</head>
<body>
<div class = "container">
	<h1 class="logo1">Org-anizer</h1>
    <h2>User/Admin Selection</h2>
    <form method="post" action="index.php">
        <button type="submit" name="role" value="user">Student</button>
        <button type="submit" name="role" value="admin">Admin</button>
    </form>
</div>
</body>
</html>



<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected role from the form
    $selectedRole = isset($_POST['role']) ? $_POST['role'] : "";

    // Process the selected role and redirect accordingly
    if ($selectedRole === "user") {
        header("Location: loginstudent.php");
        exit;
    } elseif ($selectedRole === "admin") {
        header("Location: loginadmin.php");
        exit;
    } else {
        echo "Invalid role selected.";
    }
} else {
    // If the form is not submitted, provide a message or redirect as needed
    echo "Form not submitted.";
}
?>
