<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assets</title>
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
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .footer {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
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
    <h2>View Assets</h2>

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

    // Fetch all assets from the database
    $assets_query = "SELECT * FROM asset";
    $assets_result = $conn->query($assets_query);

    if ($assets_result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Asset ID</th><th>Asset Name</th><th>Date of Expiry</th><th>Total Number</th></tr>";

        while ($row = $assets_result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['asset_id'] . "</td>";
            echo "<td>" . $row['asset_name'] . "</td>";
            echo "<td>" . $row['date_of_expiry'] . "</td>";
            echo "<td>" . $row['total_number'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No assets found.";
    }

    // Close the MySQL connection
    $conn->close();
    ?>
<div class="footer">
        &copy; 2023 IIIT Allahabad. All rights reserved.
    </div>
</body>
</html>
