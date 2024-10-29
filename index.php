<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToxicWear - Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!-- Navbar -->
<header class="navbar">
    <div class="logo">
        <img src="logo.png" alt="ToxicWear Logo">
    </div>
    <nav>
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="shop.php">Shop</a></li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    <li><a href="user.php"><i class="fa-solid fa-user"></i></a></li> <!-- User Icon -->
    <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li> <!-- Cart Icon -->
</ul>
    </nav>
</header>

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-overlay">
        <h1>Welcome to ToxicWear</h1>
        <p>Your destination for the best streetwear</p>
        <a href="shop.php" class="btn-primary">Shop Now</a>
    </div>
</section>

<!-- Main Content -->
<main>
    <section class="highlight-section">
        <h2 class="collection-title">Explore Our Collection</h2>
        <div class="collections">
            <!-- New Arrivals -->
            <div class="collection-card">
                <img src="f1.jpg" alt="New Arrivals">
                <h3>New Arrivals</h3>
                <a href="newarrivals.php" class="btn-secondary">Shop Now</a>
            </div>

            <!-- Popular T-Shirts -->
            <div class="collection-card">
                <img src="f8.jpg" alt="Popular T-Shirts">
                <h3>Popular T-Shirts</h3>
                <a href="populartshirts.php" class="btn-secondary">Shop Now</a>
            </div>

            <!-- Men's Clothing -->
            <div class="collection-card">
                <img src="f11.jpg" alt="Men's Clothing">
                <h3>Men's Clothing</h3>
                <a href="menclothing.php" class="btn-secondary">Browse Collection</a>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h4>About ToxicWear</h4>
            <p>High-quality streetwear for the bold and the brave.</p>
        </div>
        <div class="footer-section">
            <h4>Contact Us</h4>
            <p>Email: support@toxicwear.com</p>
            <p>Phone: (123) 456-7890</p>
        </div>
        <div class="footer-section">
            <h4>Follow Us</h4>
            <a href="http://www.youtube.com/@Chicostoxicos" target="_blank" aria-label="YouTube">
                <i class="fab fa-youtube"></i>
            </a>
            <a href="https://www.instagram.com/chicostoxico?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>
    <p class="footer-bottom">&copy; 2024 ToxicWear. All rights reserved.</p>
</footer>


</body>
</html>