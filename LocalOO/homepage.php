<?php
session_start();

// Database connection
$host = 'localhost';
$user = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$db_name = 'database_pos';
$con="";

// Create connection
$conn = new mysqli($host, $user, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Verify password
    if (password_verify($password, $hashed_password)) {
        // Store user info in session and redirect to dashboard or homepage
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Change to your destination page
        exit();
    } else {
        // Display an error message if login fails
        echo "Invalid username or password.";
    }
}

$conn->close();
?>