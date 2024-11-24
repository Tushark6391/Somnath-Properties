<?php
session_start();

// Replace these with your database connection details
$host = "localhost";
$port = 3325;
$username = "root";
$password = "";
$database = "display_page";

// Create the database connection
$con = mysqli_connect("localhost:3325", "root", "","display_page");

// Check the connection
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Replace these with your desired username and password
$validUsername = "RAJAN";
$validPassword = "RAJAN123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $validUsername && $password === $validPassword) {
        // Login successful, redirect to FLAT_BUY.php
        header("Location: FLAT_BUY.html");
        exit;
    } else {
        // Login failed, show an error message or redirect to an error page
        echo "Invalid username or password. Please try again.";
    }
}
?>
