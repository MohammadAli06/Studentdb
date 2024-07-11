<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="media/logo.png" type="image/x-icon"/>
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
            background: url('media/bgvideo.mp4') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
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
            max-width: 700px; 
            margin: 50px auto; 
            background-color: rgba(238, 238, 238, 0.8); 
            padding: 20px;
            border-radius: 100px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow-y: auto; 
            backdrop-filter: blur(100%); 
            -webkit-backdrop-filter: blur(5px); 
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
        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="tel"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
            border-color: rgb(120, 170, 239);
        }
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
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
                width: 80%;
                margin: 20px auto;
                padding: 15px;
            }

            .form-group input[type="submit"] {
                padding: 10px;
            }
        }

        @media (max-width: 480px) {
            .container {
                width: 80%;
                margin: 20% auto;
                padding: 5%;
            }

            .form-group input[type="text"],
            .form-group input[type="date"],
            .form-group input[type="tel"],
            .form-group input[type="email"],
            .form-group input[type="password"] {
                padding: 8px;
            }

            .form-group input[type="submit"] {
                padding: 8px;
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
        <source src="media/space.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="connect.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of birth:</label>
                <input type="date" id="dob" name="dob" placeholder="dd-mm-yyyy" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact No:</label>
                <input type="tel" id="contact" name="contact" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="Enter your address" required>
            </div>
            <div class="form-group">
                <label for="email">Email ID:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="gender" id="unknow">Gender:</label>
                <div class="radio-group">
                    <div> 
                        <label for="male" class="radio-label"><input type="radio" name="gender" id="male" value="m">
                            Male</label>
                    </div>
                    <div>
                        <label for="female" class="radio-label"><input type="radio" name="gender" id="female" value="f">
                            Female</label>
                    </div>
                    <div>
                        <label for="other" class="radio-label"><input type="radio" name="gender" id="other" value="o">
                            Other</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="file">File Upload: (Photo)</label>
                <input type="file" id="file" name="file" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Sign Up">
            </div>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
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
