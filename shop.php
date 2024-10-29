<?php
session_start();
include('server/connection.php'); // Ensure database connection

// Fetch products from the database
$query = "SELECT * FROM products";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - ToxicWear</title>
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

<!-- Shop Section -->
<section class="shop-section">
    <h1>Our Collection</h1>
    <div class="product-grid">
        <?php
        $count = 0;
        while ($product = $result->fetch_assoc()):
            if ($count % 3 == 0) echo '<div class="product-row">'; // Start a new row for every 3 products
        ?>
            <div class="product-card">
                <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                <h3><?= $product['name'] ?></h3>
                <p class="product-description"><?= $product['description'] ?></p>
                <p class="price">$<?= $product['price'] ?></p>
                <div class="size-options">
                    <label for="size">Size:</label>
                    <select name="size" id="size">
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>

                <div class="star-rating">
                    <!-- Static 5-star rating example -->
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span> <!-- One star unfilled for a 4-star rating -->
                </div>
                <a href="cart.php?id=<?= $product['id'] ?>" class="add-to-cart">Add to Cart</a>
            </div>
        <?php
            $count++;
            if ($count % 3 == 0) echo '</div>'; // Close the row after every 3 products
        endwhile;
        if ($count % 3 != 0) echo '</div>'; // Close any open row
        ?>
    </div>
</section>

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