<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// DB connection
$host = "localhost";
$username = "u776627341_gtcscurrent";
$password = "Amit@Gusain@2000";
$database = "u776627341_gtcs_website";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("❌ DB connection failed.");
}

// Check POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullName = htmlspecialchars(trim($_POST['fullName']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = $_POST['phone'] ?? '';
    $company = htmlspecialchars(trim($_POST['company'] ?? ''));
    $industry = htmlspecialchars(trim($_POST['industry'] ?? ''));
    $interests = isset($_POST['interests']) ? implode(', ', $_POST['interests']) : '';

    // Simple validation
    if ($fullName && $email) {
        $stmt = $conn->prepare(
            "INSERT INTO free_guide_requests (full_name, email, company, industry, interests)
             VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssss", $fullName, $email, $company, $industry, $interests);

        if ($stmt->execute()) {
            // Optional: send email with guide link
            mail($email, "Your Free Guide", "Here's your guide download link: https://yourdomain.com/guide.pdf", "From: info@globaltechconsultancyservice.com");

            echo "✅ Thank you! Your guide is ready to download.";
        } else {
            echo "❌ Failed to submit your request.";
        }

        $stmt->close();
    } else {
        echo "❌ Please fill in all required fields.";
    }
}

$conn->close();
?>
