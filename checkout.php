<?php
session_start();
include('server/connection.php'); // Database connection

// Calculate cart total
$total = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
}

// Handle order placement (this example just simulates an order submission)
if (isset($_POST['place_order'])) {
    // In a real application, you would save the order details in the database here

    // Clear the cart after placing the order
    unset($_SESSION['cart']);
    header("Location: thankyou.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - ToxicWear</title>
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

<!-- Checkout Section -->
<section class="checkout-section">
    <h1>Checkout</h1>
    
    <!-- Order Summary Table -->
    <h2>Order Summary</h2>
    <table class="cart-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <tr>
                    <td><img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" width="80"></td>
                    <td><?= $item['name'] ?></td>
                    <td>$<?= number_format($item['price'], 2) ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>$<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                    <td>
                        <form action="cart.php" method="post">
                            <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                            <button type="submit" name="update_quantity" value="0" style="color: red;">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" style="text-align: right;"><strong>Total:</strong></td>
                <td colspan="2"><strong>$<?= number_format($total, 2) ?></strong></td>
            </tr>
        </tfoot>
    </table>

    <!-- Shipping Information Form -->
    <h2>Shipping Information</h2>
    <form method="post" action="checkout.php">
        <div class="shipping-info">
            <label for="name">Full Name:</label>
            <input type="text" name="name" required>
            
            <label for="address">Address:</label>
            <input type="text" name="address" required>
            
            <label for="city">City:</label>
            <input type="text" name="city" required>
            
            <label for="state">State:</label>
            <input type="text" name="state" required>
            
            <label for="zip">ZIP Code:</label>
            <input type="text" name="zip" required>
            
            <label for="phone">Phone:</label>
            <input type="text" name="phone" required>
        </div>

        <!-- Payment Information Form -->
        <h2>Payment Information</h2>
        <div class="payment-info">
            <label for="card_name">Name on Card:</label>
            <input type="text" name="card_name" required>
            
            <label for="card_number">Card Number:</label>
            <input type="text" name="card_number" required>
            
            <label for="expiry">Expiration Date:</label>
            <input type="text" name="expiry" placeholder="MM/YY" required>
            
            <label for="cvv">CVV:</label>
            <input type="text" name="cvv" required>
        </div>

     <!-- Place Order Button -->
<div class="center-button">
    <button type="submit" name="place_order" class="place-order-button">Place Order</button>
</div>
</form>
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