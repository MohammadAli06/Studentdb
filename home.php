<?php
session_start();
if (!isset($_SESSION['email'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="media/logo.png" type="image/x-icon"/>
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
body { margin: 0; } 
div#slider { overflow: hidden; }
div#slider figure img { width: 20%; float: left; }
div#slider figure { 
  position: relative;
  width: 500%;
  margin: 0;
  left: 0;
  text-align: left;
  font-size: 0;
  animation: 20s slidy infinite; 
}
#slider{
    margin-top: 4%;
    width: 100%;
    height: 90vh;
    
}
@media (max-width:600px) {
   #slider{
    margin-top: 10%;
    height: 40vh;
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
            <li><a href="nologhome.html">Home</a></li>
            <li><a href="index.php">Sign Up</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
</nav>
    <div id="slider">
    <figure>
    <a href=""><img src="media/hero-1.jpg" alt></a>
    <a href=""><img src="media/hero-2.jpg" alt></a>
    <a href=""><img src="media/hero-3.jpg" alt></a>

    </figure>
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
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="media/logo.png" type="image/x-icon"/>
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

        nav {
            width: 100%;
            display: flex;
            align-items: center;
            background-color: #EEF7FF;
            justify-content: space-between;
            position: absolute;
            top: 0;
            padding: 10px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000; /* Ensure navbar stays on top */
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

        body {
            margin: 0;
        }

        div#slider {
            overflow: hidden;
            position: relative;
        }

        div#slider figure img {
            width: 20%;
            float: left;
        }

        div#slider figure {
            position: relative;
            width: 500%;
            margin: 0;
            left: 0;
            text-align: left;
            font-size: 0;
            animation: 20s slidy infinite;
        }

        #slider {
            margin-top: 4%;
            width: 100%;
            height: 90vh;
        }

        @media (max-width: 600px) {
            #slider {
                margin-top: 10%;
                height: 40vh;
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
    <div id="slider">
        <figure>
            <a href=""><img src="media/hero-1.jpg" alt></a>
            <a href=""><img src="media/hero-2.jpg" alt></a>
            <a href=""><img src="media/hero-3.jpg" alt></a>
        </figure>
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
