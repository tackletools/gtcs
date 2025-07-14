<?php
// Database connection
$host = "localhost";
$username = "u776627341_gtcscurrent";
$password = "Amit@Gusain@2000";
$database = "u776627341_gtcs_website";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $skills = isset($_POST['skills']) ? implode(", ", $_POST['skills']) : '';
    $resumePath = '';

    // File Upload
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $fileTmp = $_FILES['resume']['tmp_name'];
        $fileName = basename($_FILES['resume']['name']);
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = ['pdf', 'doc', 'docx'];

        if (in_array($fileExt, $allowed)) {
            $newFileName = uniqid('resume_', true) . '.' . $fileExt;
            $targetDir = "uploads/resumes/";
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0755, true);
            }
            $targetPath = $targetDir . $newFileName;
            if (move_uploaded_file($fileTmp, $targetPath)) {
                $resumePath = $targetPath;
            }
        }
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO freelancer_applications (name, email, phone, skills, resume_path) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $skills, $resumePath);

    if ($stmt->execute()) {
        echo "<script>alert('Application submitted successfully!'); window.location.href='joinfreelancer.php';</script>";
    } else {
        echo "<script>alert('Error occurred. Please try again.'); window.history.back();</script>";
    }

    $stmt->close();
}

$conn->close();
?>
