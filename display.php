<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .student {
            margin-bottom: 20px;
            padding: 0 10px;
        }
        .student img {
            max-width: 200px;
            max-height: 200px;
        }
    </style>
</head>

<body>
    <?php
    require 'partials/conn.php';
    $sql = "SELECT * FROM student_test"; // Modified to select data from student_test table
    $result = $conn->query($sql);


    echo "<h1 style = 'padding: 5px';>Student details</h1>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='student'>"; 
            echo "<h2>".$row['id']."</h2>Name: " . $row['name'] . "";
            echo "<p>Contact: " . $row['contact'] . "</p>";
            echo "<p>Email: " . $row['email'] . "</p>";
            if ($row['gender'] == "m")
            echo "<p>Gender: Male</p>";
            elseif($row['gender'] == "f")
            echo "<p>Gender: Female</p>";
            elseif($row['gender'] == "o")
            echo "<p>Gender: Other</p>";
            // echo "<p>Password: ".$row['password']."</p>";

            if ($row['file'] != null) {
                echo "<img src='uploads/" . $row['file'] . "' alt='Student Image'>";
            }
            echo "</div>";
            echo "<hr>";
        }
    } else {
        echo "No student records found.";
    }
    
    $conn->close();
    ?>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    var alert = document.getElementById('myAlert');

// After 5 seconds, hide the alert
setTimeout(function() {
    alert.classList.remove('show');
    alert.classList.add('hide');
    
    // After hiding, remove the alert from the DOM
    setTimeout(function() {
        alert.remove();
    }, 500); // Adjust as needed for the fade-out duration
}, 5000);
</script>
</html>
