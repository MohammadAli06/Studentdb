<?php
session_start();

if (isset($_SESSION['email'])) {
        require 'partials/conn.php';

        // Prepare SQL query to fetch student details for the logged-in user
        $loggedInEmail = $_SESSION['email'];
        $sql = "SELECT * FROM student_intern WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $loggedInEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        echo "<div class='container'>";

        echo "<h1 style='padding: 5px; text-align: center;'>Profile</h1>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='student'>";
                if ($row['file'] != null) {
                    echo "<img src='uploads/" . $row['file'] . "' alt='Student Image' style = 'padding: 3%';>";
                }
                echo "<p>Student id:".$row['id']."</p>";
                echo "<p>Name: " . $row['name'] . "</p>";
                echo "<p>Date of birth: " . $row['dob'] . "</p>";
                echo "<p>Contact: " . $row['contact'] . "</p>";
                echo "<p>Address: " . $row['address'] . "</p>";
                echo "<p>Email: " . $row['email'] . "</p>";
                if ($row['gender'] == "m")
                    echo "<p>Gender: Male</p>";
                elseif ($row['gender'] == "f")
                    echo "<p>Gender: Female</p>";
                elseif ($row['gender'] == "o")
                    echo "<p>Gender: Other</p>";
                echo "</div>";
                echo "<a href='edit_prof.php' class='btn btn-primary' style='margin-left: 10px;'>Edit Profile</a>";
                echo "<hr>";
            }
        } else {
            echo "No student records found for the logged-in user.";
        }

        $stmt->close();
        $conn->close();

        echo "<div style='text-align: center; margin-top: 20px;'>";
        echo "<a href='logout.php' class='btn btn-danger'>Logout</a>";
        echo "</div>";
    } else {
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="media/logo.png" type="image/x-icon"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <style>
        @keyframes slidy {
            0% { left: 0%; }
            20% { left: 0%; }
            25% { left: -100%; }
            45% { left: -100%; }
            50% { left: -200%; }
            70% { left: -200%; }
            75% { left: -300%; }
            95% { left: -300%; }
            100% { left: -400%; }
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGWjvxOZNxLdFl13WBAeGseBUb9cQCEyrH4Q&s');
            background-repeat: no-repeat;
            background-size: cover ;
        }
        nav {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: left; 
            background-color: #EEF7FF;
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        nav ul {
            display: flex;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            list-style: none;
            margin: 0 20px;
            position: relative;
            font-size: 16px;
        }

        nav ul li a {
            color: black;
            text-decoration: none;
            padding: 0.3rem 1rem;
            display: block;
        }

        nav ul li::after {
            content: '';
            height: 3px;
            width: 0;
            background: rgba(23, 196, 249, 0.993);
            position: absolute;
            left: 0;
            bottom: -8px;
            transition: 0.5s;
        }

        nav ul li:hover::after {
            width: 100%;
        } 

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 10px;
        }

        .hamburger span {
            height: 2px;
            width: 25px;
            background: black;
            margin-bottom: 5px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .hamburger.open span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .hamburger.open span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.open span:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }

        @media (max-width: 768px) {
            nav ul {
                display: none;
                width: 100%;
                flex-direction: column;
                background-color: #EEF7FF;
                position: absolute;
                top: 50px;
                left: 0;
            }
            nav ul.show {
                display: flex;
            }
            nav ul li {
                width: 100%;
                text-align: center;
                margin: 5px 0;
            }
            nav ul li a {
                padding: 1rem;
                border-bottom: 1px solid #ddd;
            }
            nav ul li:last-child a {
                border-bottom: none;
            }
            .hamburger {
                display: flex;
                margin-right: 20px;
            }
        }
        .student {
            margin-bottom: 20px;
            padding: 0 10px;
        }
        .student img {
            max-width: 400px;
            max-height: 400px;
        }

        .container {
            width: 60%;
            margin: 100px auto;
            background-color:#EEEEEE;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 768px) {
        .container {
            width: 80%;
            padding: 15px;
        }
    }

    @media (max-width: 480px) {
        .container {
            width: 95%;
            padding: 10px;
        }
        .student img {
            max-width: 100%;
        }
    }
    </style>
    <nav>
        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="logdisp.php">Profile</a></li>
        </ul>
    </nav>
    <script>
        function toggleMenu() {
            const navUl = document.querySelector('nav ul');
            const hamburger = document.querySelector('.hamburger');
            navUl.classList.toggle('show');
            hamburger.classList.toggle('open');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
