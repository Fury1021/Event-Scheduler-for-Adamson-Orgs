<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Retrieve data from the form
    $eventid = $_POST['eventid'];
    $orgname = $_POST['orgname'];
    $activity = $_POST['activity'];
    $venue = $_POST['venue'];
    $borrowed_chairs = $_POST['borrowed_chairs'];
    $borrowed_tables = $_POST['borrowed_tables'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    // Check if a new image is uploaded
    if (!empty($_FILES["image"]["name"])) {
        // Handle image upload
        $targetDir = __DIR__ . "/uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file is an actual image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.<br>";
                $uploadOk = 0;
            }
        }

        // Check file size
        if ($_FILES["image"]["size"] > 100000000000000) {
            echo "Sorry, your file is too large.<br>";
            $uploadOk = 0;
        }

        // Allow any file format for images
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Sorry, only image files are allowed.<br>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.<br>";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                echo "The file ". basename($_FILES["image"]["name"]). " has been uploaded.<br>";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Update the database
    if (!empty($_FILES["image"]["name"])) {
        // If a new image is uploaded, include the image column in the update
        $sql = "UPDATE events SET
        orgname = '$orgname',
        activity = '$activity',
        venue = '$venue',
        borrowed_chairs = '$borrowed_chairs',
        borrowed_tables = '$borrowed_tables',
        description = '$description',
        date = '$date',
        image = '$targetFile',  -- Update the image only if a new file is uploaded
        status = '$status'
        WHERE eventid = $eventid";
    } else {
        // If no new image is uploaded, exclude the image column from the update
        $sql = "UPDATE events SET
        orgname = '$orgname',
        activity = '$activity',
        venue = '$venue',
        borrowed_chairs = '$borrowed_chairs',
        borrowed_tables = '$borrowed_tables',
        description = '$description',
        date = '$date',
        status = '$status'
        WHERE eventid = $eventid";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Event updated successfully!<br>";
        echo '<a href="report.php">Go Back</a>';
    } else {
        echo "Error updating event: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: report.php");
    exit();
}
?>
