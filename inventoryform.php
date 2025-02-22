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

        /* Style for user button */
        a#create {
            display: inline-block;
            padding: 10px 15px;
            font-size: 16px;
            margin: 5px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        /* Style for admin button */
        a#view {
            display: inline-block;
            padding: 10px 15px;
            font-size: 16px;
            margin: 5px;
            background-color: #008CBA;
            color: white;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        /* Hover effect for buttons */
        a:hover {
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
<div class="container">
    <h1 class="logo1">Org-anizer</h1>
    <form method="post" action="index.php">
        <h2>Inventory Management</h2>

        <a href="createevent.php" id="create">Create Event</a>
        <a href="report.php" id="view">View Events</a>

    </form>
</div>
</body>
</html>
