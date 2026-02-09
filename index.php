<?php
$libraryName = "Digital Library";
$currentYear = date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $libraryName; ?> - Your Gateway to Knowledge</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<header class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <h1><?php echo $libraryName; ?></h1>
            </div>
            <ul class="nav-list">
                <li class="nav-item"><a href="#home" class="nav-active">Home</a></li>
                <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>

            </ul>
        </div>
    </div>
</header>

<section class="hero" id="home">
    <div class="container">
        <div class="hero-content">
            <h2 class="hero-title">Selamat Datang</h2>
            <p class="hero-description">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                
            </p>
            <a href="#books" class="cta-button">Browse Collection</a>
        </div>
    </div>
</section>




<section class="features" id="about">
    <div class="container">
        <h2 class="section-title">Tentang Website saya</h2>
        <p class="hero-description">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
        </p>
    </div>
</section>


<footer class="footer">
    <div class="container">
        <p class="footer-text">
            &copy; <?php echo $currentYear; ?> <?php echo $libraryName; ?>.
            All rights reserved.
        </p>
    </div>
</footer>

</body>
</html>
