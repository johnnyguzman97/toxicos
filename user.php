<?php
session_start();
include('server/connection.php'); // Ensure connection to the database

// Fetch user information from the session
$user_id = $_SESSION['user_id'];

// Handle form submission for updating profile information
if (isset($_POST['update_profile'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $query = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id='$user_id'";
    $conn->query($query);
    echo "Profile updated successfully!";
}

// Fetch order history for the user
$orderQuery = "SELECT * FROM orders WHERE user_id = '$user_id'";
$orderResult = $conn->query($orderQuery);

// Fetch user details
$userQuery = "SELECT * FROM users WHERE id = '$user_id'";
$userResult = $conn->query($userQuery);
$userData = $userResult->fetch_assoc();

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account - ToxicWear</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

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

<main class="user-page">
    <!-- Profile Update Section -->
    <section class="profile-update">
        <h2>Profile Update</h2>
        <form action="user.php" method="POST">
            <label>Username:</label>
            <input type="text" name="username" value="<?= $userData['username'] ?>" required>
            
            <label>Email:</label>
            <input type="email" name="email" value="<?= $userData['email'] ?>" required>
            
            <label>Password:</label>
            <input type="password" name="password" placeholder="Enter new password" required>
            
            <button type="submit" name="update_profile">Update Profile</button>
        </form>
    </section>

    <!-- Address Book Section -->
    <section class="address-book">
        <h2>Address Book</h2>
        <form action="user.php" method="POST">
            <label>Street Address:</label>
            <input type="text" name="address" value="<?= $userData['address'] ?>" required>

            <label>City:</label>
            <input type="text" name="city" value="<?= $userData['city'] ?>" required>

            <label>Postal Code:</label>
            <input type="text" name="postal_code" value="<?= $userData['postal_code'] ?>" required>

            <button type="submit" name="update_address">Save Address</button>
        </form>
    </section>

    <!-- Payment Method Section -->
    <section class="payment-method">
        <h2>Payment Method</h2>
        <form action="user.php" method="POST">
            <label>Card Number:</label>
            <input type="text" name="card_number" placeholder="1234-5678-9012-3456" required>

            <label>Expiration Date:</label>
            <input type="text" name="exp_date" placeholder="MM/YY" required>

            <label>CVV:</label>
            <input type="text" name="cvv" required>

            <button type="submit" name="update_payment">Save Payment Method</button>
        </form>
    </section>

    <!-- Order History Section -->
    <section class="order-history">
        <h2>Order History</h2>
        <?php if ($orderResult->num_rows > 0): ?>
            <div class="order-list">
                <?php while ($order = $orderResult->fetch_assoc()): ?>
                    <div class="order-item">
                        <p>Order ID: <?= $order['id'] ?></p>
                        <p>Order Date: <?= $order['order_date'] ?></p>
                        <p>Total: $<?= $order['total_price'] ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
    </section>

    <!-- Logout Button -->
    <form action="user.php" method="POST">
        <button type="submit" name="logout" class="logout-btn">Logout</button>
    </form>
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