<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
            color: #2975c6;
            z-index: 1;
        }
        form {
            margin-top: 20px;
        }
        .input-group {
            margin-bottom: 10px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: white;
        }
        .input-group input {
            padding: 8px;
            width: 200px;
        }
        .button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            z-index: 1;
            background-color: #3498db;
            color: white;
            border: none;
        }
        .footer {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 12px;
        }
    </style>
</head>
<body>
<img class="logo" src="IIIT_logo_transparent.gif" alt="College Logo" width="100" height="100">
    <h1>Admin Login</h1>

    <form action="" method="post">
        <div class="input-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="button" name="submit">Login</button>
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

        // Retrieve username and password from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Perform a basic query (insecure, use prepared statements in production)
        $query = "SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
        $result = $conn->query($query);

        // Check if a row is returned (successful login)
        if ($result->num_rows > 0) {
            header("Location: addasset.php");
            exit(); // You can redirect or perform other actions here
        } else {
            echo "Invalid username or password";
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
