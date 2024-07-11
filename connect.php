<?php
$name = $_POST['name'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$email = $_POST['email'];
$gender = $_POST['gender'];

$targetDir = __DIR__ . "/uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$fileSize = $_FILES["file"]["size"];

$password = $_POST['password'];

$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
if (in_array($fileType, $allowTypes)) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        $conn = new mysqli('localhost', 'root', '', 'college');
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("INSERT INTO student_intern (name, dob, contact, address, email, gender, file, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssisssss", $name, $dob, $contact, $address, $email, $gender, $fileName, $password);
            if ($stmt->execute()) {
                echo '
                 <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Registration Successful</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
                    <style>
                        .success-message {
                            text-align: center;
                            padding: 20px;
                            border-radius: 10px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            background-color: #f9f9f9;
                            margin: 50px auto;
                            max-width: 500px;
                        }
                        .success-message h1 {
                            color: #28a745;
                        }
                        .success-message .btn {
                            margin-top: 20px;
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="success-message">
                            <h1><i class="bi bi-check-circle-fill"></i> Registration Successful</h1>
                            <p>Uploaded file: ' . htmlspecialchars($fileName) . '</p>
                            <p>File size: ' . htmlspecialchars(number_format($fileSize / 1024, 2)) . ' KB</p>
                            <p>File type: ' . htmlspecialchars($fileType) . '</p>
                            <a href="login.php" class="btn btn-primary">Log In</a>
                        </div>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
                </body>
                </html>';
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
            $conn->close();
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.";
}
?> 