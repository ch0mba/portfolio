<?php
// Database connection
$host = 'localhost:3306'; // Adjust the port if necessary
$dbname = 'portfoliodb';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Basic validation
    if (empty($name) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid form submission.");
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    if ($stmt->execute()) {
        echo "Message sent successfully!";
    } else {
        die("Error saving message.");
    }
}
?>
