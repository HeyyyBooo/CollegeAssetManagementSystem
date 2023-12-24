<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Asset</title>
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
        form {
            display: inline-block;
            text-align: left;
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.285); /* White background with some transparency */
            padding: 10px; /* Padding for the white background */
            border-radius: 8px;
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
    <h2>Add Asset</h2>

    <form action="" method="post">
        <label for="asset_name">Asset Name:</label>
        <input type="text" id="asset_name" name="asset_name" required>

        <label for="date_of_expiry">Date of Expiry:</label>
        <input type="date" id="date_of_expiry" name="date_of_expiry" required>

        <label for="total_number">Total Number:</label>
        <input type="number" id="total_number" name="total_number" required>

        <button type="submit" name="submit">Add Asset</button>
    </form>

    <?php
    if(isset($_POST['submit'])){
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

        // Retrieve asset details from the form
        $asset_name = $_POST['asset_name'];
        $date_of_expiry = $_POST['date_of_expiry'];
        $total_number = $_POST['total_number'];

        // Perform an insert query
        $query = "INSERT INTO asset (asset_name, date_of_expiry, total_number) VALUES ('$asset_name', '$date_of_expiry', $total_number)";
        
        if ($conn->query($query) === TRUE) {
            echo "<p>Asset added successfully!</p>";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        // Close the MySQL connection
        $conn->close();
    }
    ?>
<div class="footer">
        &copy; 2023 IIIT Allahabad. All rights reserved.
    </div>
</body>
</html>
