<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <link rel="stylesheet" href="/CSS/Product.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Sidebar Navigation -->
        <div class="sidebar">
            <div class="nav-item home">
                <span class="material-icons-outlined">home</span>HOME
            </div>
            <div class="nav-item pending">
                <span class="material-icons-outlined">pending</span>PENDING
            </div>
            <div class="nav-item logout">
                <span class="material-icons-outlined">logout</span>Logout
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="search-container">
                <input type="text" placeholder="Search" id="search-input">
                <button class="search-button"><h3>Search</h3></button>
            </div>
            <div class="buttons-container">
                <button class="category-button" onclick="filterCategory('MILKTEA')"><h5>MILKTEA</h5></button>
                <button class="category-button" onclick="filterCategory('COFFEE')"><h5>COFFEE</h5></button>
            </div>

            <div class="product-list">
                <?php
                // Connect to the database
                $conn = new mysqli("localhost", "root", "", "pos_system");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch products from the database
                $category = isset($_GET['category']) ? $_GET['category'] : '';
                $query = "SELECT * FROM products";
                if ($category) {
                    $query .= " WHERE category = '" . $conn->real_escape_string($category) . "'";
                }
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <div class='product-item'>
                            <h3>{$row['name']}</h3>
                            <p>₱{$row['price']}</p>
                            <button class='add-to-order' data-id='{$row['id']}' data-name='{$row['name']}' data-price='{$row['price']}'>Add to Order</button>
                        </div>";
                    }
                } else {
                    echo "<p>No products available</p>";
                }

                $conn->close();
                ?>
            </div>

            <div class="pagination">
                <button class="page-button active">1</button>
                <button class="page-button">2</button>
                <button class="page-button">Last</button>
                <button class="page-button">Next</button>
            </div>
        </div>

        <!-- Order Section -->
        <div class="order-section">
            <div class="order-header">
                <h1>Current Order</h1>
                <button class="clear-button"><h3>Clear</h3></button>
            </div>
            <div class="order-list" id="order-list">
                <!-- Orders will be displayed here -->
            </div>
            <div class="order-footer">
                <p>Total: ₱<span id="total-amount">00</span></p>
                <div class="payment-buttons">
                    <button class="pay-later"><h1>Pay Later</h1></button>
                    <button class="pay-now"><h1>Pay Now</h1></button>
                </div>
            </div>
        </div>
    </div>

    <script src="Java/product.php"></script>
</body>
</html>
