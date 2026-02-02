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
                <li class="nav-item"><a href="#books" class="nav-link">Books</a></li>
                <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</header>

<section class="hero" id="home">
    <div class="container">
        <div class="hero-content">
            <h2 class="hero-title">Discover a World of Knowledge</h2>
            <p class="hero-description">
                Explore our vast collection of books, digital resources,
                and research materials. Your journey starts here at
                <?php echo $libraryName; ?>.
            </p>
            <a href="#books" class="cta-button">Browse Collection</a>
        </div>
    </div>
</section>




<section class="features" id="services">
    <div class="container">
        <h2 class="section-title">Our Services</h2>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📚</div>
                <h3 class="feature-title">Book Collection</h3>
                <p class="feature-description">
                    Access thousands of books across various genres and subjects
                    in our comprehensive collection.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">💻</div>
                <h3 class="feature-title">E-Library</h3>
                <p class="feature-description">
                    Browse and download e-books, journals, and digital resources
                    anytime and anywhere.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">🪑</div>
                <h3 class="feature-title">Reading Room</h3>
                <p class="feature-description">
                    Comfortable and quiet reading rooms designed for focus
                    and productivity.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3 class="feature-title">Membership</h3>
                <p class="feature-description">
                    Become a member and enjoy exclusive benefits and
                    extended borrowing privileges.
                </p>
            </div>
        </div>
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
