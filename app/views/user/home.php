<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/home/home-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/home/home-queries.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Montserrat|Sacramento" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a8f32993e8.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <title><?php echo TITLE?></title>
</head>
<body>
<header>
        <nav>
            <div class="row">
                <img src="<?php echo URL?>vendors/images/thekolaya.png" class="logo">
                <img src="<?php echo URL?>vendors/images/thekolaya.png" class="logo-black">
                <div class="main-nav">
                    <a href="<?php echo URL?>Login">LOG IN</a>
                </div>
            </div>
        </nav>
        <div class="hero-text-box">
            <h1>WELCOME TO<br><b>තේ කොළය.</b></h1>
            <a class="btn btn-full js--scroll-to-plans" href="<?php echo URL?>Registration">REGISTER NOW</a>
        </div>
    </header>
    
    <section class="section-features" id="features">
        <div class="row">
            <h2>WHO ARE WE</h2>
            <p class="long-copy" style="text-align: justify;" >
            We are Samrin Tea Factory situated in Naakiyadeniya, Galle Sri Lanka. 
            For over 20 years, we have provided the finest tea leaves in the country with an everlasting taste.
            This system is intended for use by all users who interact with our factory, including our employees, management, and landowners who provide the highest quality tea leaves
            Our main goal is to increase the productivity of our factory by allowing users to interact with us in a smarter way than the traditional manual methods


            </p>
        </div> 
    </section>
    <div class="bottom-container">
        <ul>
            <li>
                <a href="<?php echo URL?>User/termsConditions">TERMS & CONDITIONS</a>
            </li>

            <li>
                <a href="#">ABOUT US</a>
            </li>

            <li>
                <a href="#">CONTACT US</a>
            </li>

            <li class="social-icons">
                <i class="fab fa-facebook" id="facebook"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-whatsapp"></i>
                <i class="fab fa-twitter"></i>
            </li>
        </ul>
    </div>
</body>
</html>
