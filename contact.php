<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - ToxicWear</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!-- Navbar -->
<header class="navbar">
    <div class="logo">
        <a href="index.php"><img src="logo.png" alt="ToxicWear Logo"></a>
    </div>
    <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="shop.php">Shop</a></li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    <li><a href="user.php"><i class="fa-solid fa-user"></i></a></li> <!-- User Icon -->
    <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li> <!-- Cart Icon -->
</ul>
</header>

<!-- Contact Hero Section -->
<section class="hero-section contact-hero">
    <div class="hero-overlay">
        <h1>Contact Us</h1>
        <p>We’d love to hear from you! Reach out with any questions or feedback.</p>
    </div>
</section>

<!-- Contact Form Section -->
<main class="contact-content">
    <section class="contact-details">
        <div class="contact-card">
            <i class="fas fa-envelope"></i>
            <h3>Email Us</h3>
            <p>support@toxicwear.com</p>
        </div>
        <div class="contact-card">
            <i class="fas fa-phone-alt"></i>
            <h3>Call Us</h3>
            <p>(123) 456-7890</p>
        </div>
        <div class="contact-card">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Visit Us</h3>
            <p>123 ToxicWear St., Fashion City</p>
        </div>
    </section>

    <section class="contact-form">
        <h2>Send Us a Message</h2>
        <form action="submit_contact.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit" class="btn-primary">Send Message</button>
        </form>
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
