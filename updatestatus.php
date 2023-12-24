<?php
// Replace these values with your MySQL database credentials
$hostname = "localhost";
$username = "root";
$password = '';
$database = "ams";

// Create a MySQL connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all maintenance requests from the database
$maintenance_query = "SELECT * FROM maintenance";
$maintenance_result = $conn->query($maintenance_query);

// Check if maintenance requests are available
if ($maintenance_result->num_rows > 0) {
    $maintenance_ids = array();
    while ($row = $maintenance_result->fetch_assoc()) {
        $maintenance_ids[] = $row['maintenance_id'];
    }
} else {
    echo "No maintenance requests found.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_maintenance_id = $_POST['maintenance_id'];
    $status = $_POST['status'];

    // Update the status in the maintenance table
    $update_query = "UPDATE maintenance SET status='$status' WHERE maintenance_id='$selected_maintenance_id'";

    if ($conn->query($update_query) === FALSE) {
        echo "Error updating status for Maintenance ID $selected_maintenance_id: " . $conn->error;
    } else {
        echo "Status updated successfully!";
    }
}

// Close the MySQL connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Maintenance Status</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Copperplate Gothic Light;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            background: url('background.jpg') center/cover fixed no-repeat;
            height: 100vh;
            filter: blur(0px);
        }
        h2 {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.285); /* White background with some transparency */
            padding: 8px; /* Padding for the white background */
            border-radius: 4px; 
            color: #120054;
            z-index: 1;
        }
        
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            margin-top: 5px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            z-index: 1;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .footer {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
        }
        form {
            display: inline-block;
            text-align: left;
        }
        select {
            margin-top: 5px;
        }
        .header-buttons {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            gap: 10px;
        }
        .header-buttons a {
            text-decoration: none;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #663cff77;
        }
    </style>
</head>
<body>
    <div class="header-buttons">
        <a href="index.html">Home</a>
        <a href="maintenancemenu.html">Maintenance Staff</a>
        <a href="adminmenu.html">College Admin</a>
        <a href="aboutus.html">About Us</a>
    </div>
<img class="logo" src="IIIT_logo_transparent.gif" alt="College Logo" width="100" height="100">
 
    <h2>Update Maintenance Status</h2>

    <form action="" method="post">
        <label for="maintenance_id">Select Maintenance ID:</label>
        <select id="maintenance_id" name="maintenance_id" required>
            <?php
            foreach ($maintenance_ids as $id) {
                echo "<option value='$id'>$id</option>";
            }
            ?>
        </select>

        <label for="status">Select Status:</label>
        <select id="status" name="status" required>
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
        </select>
<p></p>
        <button class="button" type="submit">Update Status</button>
    </form>
    <div class="footer">
        &copy; 2023 IIIT Allahabad. All rights reserved.
    </div>
</body>
</html>
