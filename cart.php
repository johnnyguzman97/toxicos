<?php
session_start();
include('server/connection.php'); // Ensure database connection

// Check if "Add to Cart" was clicked and handle adding items to the session cart
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $quantity = 1; // Default quantity when first added

    // Fetch product details from database
    $query = "SELECT * FROM products WHERE id = '$product_id'";
    $result = $conn->query($query);
    $product = $result->fetch_assoc();

    if ($product) {
        // Prepare product details for cart
        $cart_item = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'image' => $product['image'],
            'quantity' => $quantity
        ];

        // Check if cart session already exists and update or add item
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity; // Increase quantity
        } else {
            $_SESSION['cart'][$product_id] = $cart_item; // Add new item
        }
    }
}

// Update cart item quantities
if (isset($_POST['update_quantity'])) {
    $product_id = $_POST['product_id'];
    $new_quantity = $_POST['quantity'];

    if ($new_quantity > 0) {
        $_SESSION['cart'][$product_id]['quantity'] = $new_quantity;
    } else {
        unset($_SESSION['cart'][$product_id]); // Remove item if quantity is 0
    }
}

// Calculate total
$total = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - ToxicWear</title>
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

<!-- Cart Section -->
<section class="cart-section">
    <h1>Your Cart</h1>
    <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
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
                        <td>
                            <form action="cart.php" method="post">
                                <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" style="width: 50px;">
                                <button type="submit" name="update_quantity">Update</button>
                            </form>
                        </td>
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
        
        <div class="proceed-button-container">
    <a href="checkout.php" class="proceed-button">Proceed to Checkout</a>
</div>



    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
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
