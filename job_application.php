<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $upload_dir = "../uploads/";
    if (!is_dir($upload_dir)) { mkdir($upload_dir, 0777, true); }

    $file_name = uniqid("cv_") . "." . pathinfo($_FILES['cv']['name'], PATHINFO_EXTENSION);
    $target = $upload_dir . $file_name;

    if (move_uploaded_file($_FILES['cv']['tmp_name'], $target)) {

        $stmt = $conn->prepare("INSERT INTO job_applications (fullname, email, phone, position, qualifications, cv_file) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['fullname'],
            $_POST['email'],
            $_POST['phone'],
            $_POST['position'],
            $_POST['qualifications'],
            $file_name
        ]);

        echo "✅ Application submitted! Thank you, {$_POST['fullname']}.";
    } else {
        echo "❌ CV Upload failed. Please try again.";
    }
}
?>
