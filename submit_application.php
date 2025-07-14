<?php
// ==== 1. Database Configuration ====
$host     = "localhost";       // usually "localhost"
$username = "u776627341_gtcscurrent";            // your DB username
$password = "Amit@Gusain@2000";                // your DB password
$database = "u776627341_gtcs_website";   // your DB name

// ==== 2. Connect to Database ====
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// ==== 3. Handle Form Submission ====
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name  = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));

    // ==== 4. Handle File Upload ====
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {
        $uploadDir = 'uploads/';
        $originalName = basename($_FILES['resume']['name']);
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);

        // Validate file type
        $allowed = ['pdf', 'doc', 'docx'];
        if (!in_array(strtolower($extension), $allowed)) {
            die("Only PDF, DOC, or DOCX files are allowed.");
        }

        // Unique file name
        $fileName = uniqid("resume_") . "." . $extension;
        $uploadPath = $uploadDir . $fileName;

        // Move file
        if (move_uploaded_file($_FILES['resume']['tmp_name'], $uploadPath)) {
            // ==== 5. Insert into Database ====
            $stmt = $conn->prepare("INSERT INTO job_applications (name, email, phone, resume) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $phone, $fileName);

            if ($stmt->execute()) {
                echo "✅ Application submitted successfully.";
            } else {
                echo "❌ Failed to save application in database.";
            }

            $stmt->close();
        } else {
            echo "❌ Failed to upload resume.";
        }
    } else {
        echo "❌ Resume upload error.";
    }
}

$conn->close();
?>
