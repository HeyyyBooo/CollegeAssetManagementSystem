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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $asset_id = $_POST["asset_id"];
    $assign_date = date("Y-m-d");
    $last_maintenance_date = $_POST["last_maintenance_date"];
    $staff_id = $_POST["staff_id"];

    // Perform an insert query
    $insert_query = "INSERT INTO maintenance (asset_id, assign_date, last_maintenance_date, staff_id) 
                     VALUES ('$asset_id', '$assign_date', '$last_maintenance_date', '$staff_id')";

    if ($conn->query($insert_query) === TRUE) {
        echo "Maintenance request assigned successfully!";
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}
$current_date = date("Y-m-d");
// Close the MySQL connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Maintenance Request</title>
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
        h1 {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.285); /* White background with some transparency */
            padding: 8px; /* Padding for the white background */
            border-radius: 4px; 
            color: #120054;
            z-index: 1;
        }
        .menu-options {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.285); /* White background with some transparency */
            padding: 10px; /* Padding for the white background */
            border-radius: 8px; /* Optional: Adds rounded corners for a better look */
        }
        .option {
            margin: 10px;
        }
        .button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            z-index: 1;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .subbutton{
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            z-index: 1;
            background-color: #663cff77;
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
    <h2>Assign Maintenance Request</h2>

    <form action="" method="post">
        <label for="asset_id">Asset ID:</label>
        <input type="number" id="asset_id" name="asset_id" required>

        <label for="assign_date">Assign Date:</label>
        <input type="text" id="assign_date" name="assign_date" value="<?php echo date('Y-m-d'); ?>" disabled>
        
        <label for="last_maintenance_date">Last Maintenance Date:</label>
        <input type="date" id="last_maintenance_date" name="last_maintenance_date" required>

        <label for="staff_id">Staff ID:</label>
        <input type="number" id="staff_id" name="staff_id" required>
<p></p>
        <button class="button"type="submit">Assign Maintenance Request</button>
    </form>
    <div class="footer">
    &copy; 2023 IIIT Allahabad. All rights reserved.
</div>
</body>
</html>
