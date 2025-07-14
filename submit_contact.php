<?php
// 1. Enable error reporting (for debugging)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. DB connection
$host     = "localhost";
$username = "u776627341_gtcscurrent";
$password = "Amit@Gusain@2000";
$database = "u776627341_gtcs_website";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Handle form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = htmlspecialchars(trim($_POST['email']));
    $phone   = htmlspecialchars(trim($_POST['phone']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

    if ($stmt->execute()) {
        echo "✅ Message sent successfully!";
    } else {
        echo "❌ Failed to send message.";
    }

    $stmt->close();
}
$conn->close();
?>
