<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        nav {
            width: 100%;
            display: flex;
            align-items:center;
            background-color: #EEF7FF;
            justify-content: space-between;
            position: absolute;
            top: 0;
            padding: 10px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
        .container {
            width: 100%;
            max-width: 500px; 
            background-color: rgba(238, 238, 238, 0.8);
            padding: 20px;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px); 
            -webkit-backdrop-filter: blur(10px); 
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            border-color: rgb(153, 189, 241);
        }
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
        }
        .form-group input[type="submit"] {
            background: linear-gradient(45deg, #007bff, #00d4ff);
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s ease;
            width: 100%;
        }
        .form-group input[type="submit"]:hover {
            background: linear-gradient(45deg, #00d4ff, #007bff);
        }
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        p {
            text-align: center;
        }
        p a {
            color: #007bff;
            text-decoration: none;
        }
        p a:hover {
            text-decoration: underline;
        }
        .background-images {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .background-images img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .background-images img:hover {
            transform: scale(1.1);
        }
        video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 15px;
                border-radius: 10px;
                margin: 20px auto;
            }
        }
        @media (max-width: 480px) {
            .container {
                width: 80%;
                padding: 10px;
                border-radius: 10px;
                margin: 15px auto;
            }
            .form-group input[type="email"],
            .form-group input[type="password"] {
                width: 90%;
            }
        }
        @media (max-width: 768px) {
            .background-images {
                justify-content: center;
            }
            .background-images img {
                width: 100px;
                height: 100px;
                margin: 5px;
            }
        }
        @media (max-width: 480px) {
            .background-images {
                justify-content: center;
            }
            .background-images img {
                width: 80px;
                height: 80px;
                margin: 5px;
            }
        }
    </style>
</head>
<body>
<nav>
        <div class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul>
            <li><a href="nologhome.html">Home</a></li>
            <li><a href="index.php">Sign Up</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    <video autoplay muted loop>
        <source src="media/bgvideo.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
    <div class="container">
        <h2>Login</h2>
        <form action="validate.php" method="post">
            <div class="form-group">
                <label for="email">Email ID:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
        </form>
        <div class="background-images">
            <img src="media/image1.jpg" alt="Image 1">
            <img src="media/image2.jpg" alt="Image 2">
            <img src="media/image3.jpg" alt="Image 3">
        </div>
        <p>Don't have an account? <a href="index.php">Register now</a></p>
    </div>
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
