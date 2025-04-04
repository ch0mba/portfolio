<?php
// Database connection
$host = 'localhost'; // Adjust the port if necessary
$database = 'portfoliodb';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $database);

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
        // Delay before redirection
        sleep(3);
                
        // Redirect to home page
        header("Location: index.html");
        exit();

    } else {
        die("Error saving message.");
    }
}
?>
