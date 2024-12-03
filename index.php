<?php
// Include database connection
include 'db_connection.php';

// Fetch housing listings
$housing_query = "
    SELECT Property.address, Property.price, House.bedrooms, House.bathrooms, House.size 
    FROM Property 
    INNER JOIN House ON Property.address = House.address;
";
$housing_results = $conn->query($housing_query);

// Fetch business property listings
$business_query = "
    SELECT Property.address, Property.price, BusinessProperty.type, BusinessProperty.size 
    FROM Property 
    INNER JOIN BusinessProperty ON Property.address = BusinessProperty.address;
";
$business_results = $conn->query($business_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Portal</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php include 'header.php'; ?>

<h2>Welcome to the Real Estate Portal</h2>

<!-- Housing Listings -->
<section>
    <h2>Housing Listings</h2>
    <?php if ($housing_results->num_rows > 0): ?>
        <table>
            <thead>
            <tr>
                <th>Address</th>
                <th>Price</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Size (sq ft)</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $housing_results->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['address']); ?></td>
                    <td><?= htmlspecialchars($row['price']); ?></td>
                    <td><?= htmlspecialchars($row['bedrooms']); ?></td>
                    <td><?= htmlspecialchars($row['bathrooms']); ?></td>
                    <td><?= htmlspecialchars($row['size']); ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No housing listings found.</p>
    <?php endif; ?>
</section>

<!-- Business Listings -->
<section>
    <h2>Business Property Listings</h2>
    <?php if ($business_results->num_rows > 0): ?>
        <table>
            <thead>
            <tr>
                <th>Address</th>
                <th>Price</th>
                <th>Type</th>
                <th>Size (sq ft)</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($row = $business_results->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['address']); ?></td>
                    <td><?= htmlspecialchars($row['price']); ?></td>
                    <td><?= htmlspecialchars($row['type']); ?></td>
                    <td><?= htmlspecialchars($row['size']); ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No business property listings found.</p>
    <?php endif; ?>
</section>
</body>
</html>
