<?php
$conn = new mysqli('localhost', 'root', '', 'college');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
?>