<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Asset</title>
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
    <h2>Delete Asset</h2>

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

    if(isset($_POST['submit'])) {
        // Retrieve asset details from the form
        $asset_id = $_POST['asset_id'];
        $number_of_assets = $_POST['number_of_assets'];

        // Check if the asset exists
        $check_query = "SELECT * FROM asset WHERE asset_id = $asset_id";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            // Perform a delete query
            $delete_query = "UPDATE asset SET total_number = total_number - $number_of_assets WHERE asset_id = $asset_id";

            if ($conn->query($delete_query) === TRUE) {
                echo "<p>Assets deleted successfully!</p>";
                // Redirect to a page or display a success message
            } else {
                echo "Error: " . $delete_query . "<br>" . $conn->error;
            }
        } else {
            echo "Asset not found.";
        }
    }
    ?>

    <form action="" method="post">
        <label for="asset_id">Asset ID:</label>
        <input type="number" id="asset_id" name="asset_id" required>

        <label for="number_of_assets">Number of Assets to Delete:</label>
        <input type="number" id="number_of_assets" name="number_of_assets" required>

        <button type="submit" name="submit">Delete Asset</button>
    </form>
    <div class="footer">
        &copy; 2023 IIIT Allahabad. All rights reserved.
    </div>
</body>
</html>
