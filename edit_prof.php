<?php
session_start();

if (isset($_SESSION['email'])) {
    require 'partials/conn.php';

    $loggedInEmail = $_SESSION['email'];
    $sql = "SELECT * FROM student_intern WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $loggedInEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo "<div class='container'>";
        echo "<h1 style='padding: 5px; text-align: center;'>Edit Profile</h1>";
        echo "<form action='update_prof.php' method='POST' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>";
        echo "<div class='mb-3'><label>Name:</label><input type='text' name='name' value='" . htmlspecialchars($row['name']) . "' class='form-control'></div>";
        echo "<div class='mb-3'><label>Date of birth:</label><input type='date' name='dob' value='" . htmlspecialchars($row['dob']) . "' class='form-control'></div>";
        echo "<div class='mb-3'><label>Contact:</label><input type='text' name='contact' value='" . htmlspecialchars($row['contact']) . "' class='form-control'></div>";
        echo "<div class='mb-3'><label>Address:</label><input type='text' name='address' value='" . htmlspecialchars($row['address']) . "' class='form-control'></div>";
        echo "<div class='mb-3'><label>Email:</label><input type='email' name='email' value='" . htmlspecialchars($row['email']) . "' class='form-control'></div>";
        echo "<div class='mb-3'><label>Gender:</label><select name='gender' class='form-control'>";
        echo "<option value='m'" . ($row['gender'] == 'm' ? ' selected' : '') . ">Male</option>";
        echo "<option value='f'" . ($row['gender'] == 'f' ? ' selected' : '') . ">Female</option>";
        echo "<option value='o'" . ($row['gender'] == 'o' ? ' selected' : '') . ">Other</option>";
        echo "</select></div>";
        echo "<div class='mb-3'><label>Profile Picture:</label><input type='file' name='file' class='form-control'></div>";
        echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "No student records found for the logged-in user.";
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: login.php");
    exit();
}
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
</body>
</html>
