//Alicia Cook
//Dudleen Paul
//Kensia Saint-Hilaire

<?php
// Include database connection
include 'db_connection.php';
include 'header.php';
// Determine the search type (house or business)
$search_type = $_POST['search_type'];

if ($search_type === 'house') {
    // Sanitize and validate inputs for house search
    $min_price = isset($_POST['min_price_house']) ? floatval($_POST['min_price_house']) : 0;
    $max_price = isset($_POST['max_price_house']) ? floatval($_POST['max_price_house']) : 0;
    $bedrooms = isset($_POST['bedrooms']) ? intval($_POST['bedrooms']) : 0;
    $bathrooms = isset($_POST['bathrooms']) ? intval($_POST['bathrooms']) : 0;

    // Query for houses
    $sql = "
        SELECT Property.address, Property.price, House.bedrooms, House.bathrooms, House.size
        FROM Property
        JOIN House ON Property.address = House.address
        WHERE Property.price BETWEEN ? AND ?
        AND House.bedrooms = ?
        AND House.bathrooms = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ddii", $min_price, $max_price, $bedrooms, $bathrooms);
} else {
    // Sanitize and validate inputs for business property search
    $min_price = isset($_POST['min_price_business']) ? floatval($_POST['min_price_business']) : 0;
    $max_price = isset($_POST['max_price_business']) ? floatval($_POST['max_price_business']) : 0;
    $min_size = isset($_POST['min_size']) ? intval($_POST['min_size']) : 0;
    $max_size = isset($_POST['max_size']) ? intval($_POST['max_size']) : 0;

    // Query for business properties
    $sql = "
        SELECT Property.address, Property.price, BusinessProperty.type, BusinessProperty.size
        FROM Property
        JOIN BusinessProperty ON Property.address = BusinessProperty.address
        WHERE Property.price BETWEEN ? AND ?
        AND BusinessProperty.size BETWEEN ? AND ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ddii", $min_price, $max_price, $min_size, $max_size);
}

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Display search results
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>Search Results</h1>
<?php if ($result->num_rows > 0): ?>
    <table>
        <thead>
        <tr>
            <th>Address</th>
            <th>Price</th>
            <?php if ($search_type === 'house'): ?>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Size (sq ft)</th>
            <?php else: ?>
                <th>Type</th>
                <th>Size (sq ft)</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['address']); ?></td>
                <td>$<?= htmlspecialchars(number_format($row['price'], 2)); ?></td>
                <?php if ($search_type === 'house'): ?>
                    <td><?= htmlspecialchars($row['bedrooms']); ?></td>
                    <td><?= htmlspecialchars($row['bathrooms']); ?></td>
                    <td><?= htmlspecialchars($row['size']); ?></td>
                <?php else: ?>
                    <td><?= htmlspecialchars($row['type']); ?></td>
                    <td><?= htmlspecialchars($row['size']); ?></td>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No properties match your search criteria.</p>
<?php endif; ?>
</body>
</html>

<?php
// Close the statement and connection
$stmt->close();
$conn->close();
?>
