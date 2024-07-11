<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    require 'partials/conn.php';

    $email = stripcslashes($email);
    $password = stripcslashes($password);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM student_intern WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['email'] = $email; 
        header("Location: home.php");
        exit(); 
    }  else {
        echo "<h1> Login failed. Invalid email or password.</h1>";
    }

    $conn->close();
} 
?> 
