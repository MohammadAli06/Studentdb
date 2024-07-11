<?php
session_start();
if (isset($_SESSION['email'])) {
    require 'partials/conn.php';
    header("Location: logdisp.php");
    $id = $_POST['id'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    // Handle file upload
    $file = $_FILES['file']['name'];
    $targetDir = __DIR__ . "/uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

    if (!empty($file) && in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $sql = "UPDATE student_intern SET name=?, dob=?, contact=?, address=?, email=?, gender=?, file=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssi", $name, $dob, $contact, $address, $email, $gender, $fileName, $id);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    } else {
        $sql = "UPDATE student_intern SET name=?, dob=?, contact=?, address=?, email=?, gender=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssi", $name, $dob, $contact, $address, $email, $gender, $id);
    }

    if ($stmt->execute()) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: login.php");
    exit();
}
?>
