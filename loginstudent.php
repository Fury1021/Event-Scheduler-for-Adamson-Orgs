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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for the login credentials
    $sql = "SELECT * FROM $table_name WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if the login credentials are valid
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: profilestudent.php");
    } else {
        $login_error = "Invalid username or password.";
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
    <title>Login</title>
    <link rel="icon" href="favicon.png" type="image">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(adubu.jpeg);
			background-size: cover;
			background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
        }

        .logincontainer {
			width: 400px;
            margin: 150px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
			text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
		
		.orglogo img {
		  width: 100px;
		  height: 100px;
		}

        label {
            display: block;
            margin-bottom: 8px;
        }

        .inputboxes input[type="text"],
		.inputboxes input[type="password"] {
		  width: 90%;
		  padding: 10px;
		  margin-bottom: 5px;
		  border-radius: 5px;
		  border: 1px solid #ccc;
		}
		
		.loginbutton input[type="submit"] {
		  width: 100%;
		  padding: 10px;
		  background-color: #4CAF50;
		  color: white;
		  border: none;
		  border-radius: 5px;
		  cursor: pointer;
		}
		
        input[type="submit"]:hover {
            background-color: #45a049;
        }
		
		.button1 {
			margin-left: 90px;
			display: flex;
		}
		
		.button2-2 {
			margin-left: 20px;
		}
		
		button {
            background-color: #008CBA;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 8px;
        }

        button:hover {
            background-color: #007aa7;
        }
		
		.paragraph {
			text-align: center;
			margin: 0;
			margin-top: 15px;
			margin-bottom: 15px;
		}
		
		.navbar {
		  background-color: #f3f3f3;
		  height: 75px;
		  display: flex;
		  justify-content: space-between;
		  align-items: center;
		  padding: 0 20px;
		}

		.logo1 {
		  font-size: 30px;
		  color: rgb(13, 184, 236);
		  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
		
		.logo2 {
		  margin-top: 10px;
		}

		.logo2 img {
		  width: 30px;
		  height: 30px;
		  margin: 0 10px;
		}

		.footer {
		  background-color: #f2f2f2;
		  padding: 20px;
		  text-align: center;
		}

		.footer ul {
		  list-style-type: none;
		  padding: 0;
		}

		.footer li {
		  display: inline;
		  margin-right: 20px;
		}

		.footer a {
		  text-decoration: none;
		  color: #333;
		}
		
		.error-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px;
            background-color: #ffcccc;
            border: 1px solid #ff0000;
            border-radius: 5px;
            text-align: center;
            font-size: 14px;
        }

    </style>
	
	<script>
        function showErrorPopup(message) {
            var errorPopup = document.getElementById('error-popup');
            errorPopup.innerHTML = message;
            errorPopup.style.display = 'block';

            // Close the popup after 3 seconds (adjust the timeout as needed)
            setTimeout(function () {
                errorPopup.style.display = 'none';
            }, 3000);
        }
    </script>
	
</head>
<body>

	<div class="navbar">
    <div class="icon">
      <h2 class="logo1">Org-anizer</h2>
    </div>
	</div>
	
	<div class = "logincontainer">
	
	<div class="orglogo">
      <img src="images\system.png" alt="system">
    </div>
	
    <h2>Login</h2>
    <form method="post" action="loginstudent.php">
	
	<div class="inputboxes">
        <input type="text" placeholder="Username" id="username" name="username" required><br><br>
        <input type="password" placeholder="Password" id="password" name="password" required><br><br>
	</div>
    <div class="loginbutton">
		<input type="submit" value="Login">
	</div>
    </form>
	
	<div class="button1">
    <form action="createstudent.php" method="get">
        <button type="submit" class="button2-1">Sign Up</button>
    </form> 
    <form action="forgotpasswordstudent.php" method="get">
        <button type="submit" class="button2-2">Forgot Password</button>
    </form>
	</div>
	
    <form action="index.php" method="get">
        <button type="submit">Change User</button>
    </form>
	</div>
	
	<div id="error-popup" class="error-popup"></div>
	
	<div class="footer">
    <p class="paragraph">Follow us on:</p>
    <nav>
      <div class="logo2">
        <img src="images\bxl-facebook-circle.png" alt="Facebook">
        <img src="images\bxl-twitter.png" alt="Twitter">
        <img src="images\bxl-instagram.png" alt="Instagram">
      </div>
    </nav>
    <p class="paragraph">&copy; 2023 Org-anizer. All rights reserved.</p>
  </div>
    
	<?php
    if (isset($login_error)) {
        echo "<script>showErrorPopup('$login_error');</script>";
    }
    ?>
</body>
</html>
