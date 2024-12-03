<?php
include 'db_connection.php';
include 'header.php';
$query = "
    SELECT Buyer.id, Buyer.name, Buyer.phone, Buyer.propertyType, 
           Buyer.bedrooms, Buyer.bathrooms, Buyer.businessPropertyType, 
           Buyer.minimumPreferredPrice, Buyer.maximumPreferredPrice
    FROM Buyer;
";
$results = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Buyers</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>All Buyers</h1>
<?php if ($results->num_rows > 0): ?>
    <table>
        <thead>
        <tr>
            <th>Buyer ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Preferred Property Type</th>
            <th>Bedrooms</th>
            <th>Bathrooms</th>
            <th>Business Property Type</th>
            <th>Min Price</th>
            <th>Max Price</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $results->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']); ?></td>
                <td><?= htmlspecialchars($row['name']); ?></td>
                <td><?= htmlspecialchars($row['phone']); ?></td>
                <td><?= htmlspecialchars($row['propertyType']); ?></td>
                <td><?= htmlspecialchars($row['bedrooms']); ?></td>
                <td><?= htmlspecialchars($row['bathrooms']); ?></td>
                <td><?= htmlspecialchars($row['businessPropertyType']); ?></td>
                <td><?= htmlspecialchars($row['minimumPreferredPrice']); ?></td>
                <td><?= htmlspecialchars($row['maximumPreferredPrice']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No buyers found.</p>
<?php endif; ?>
</body>
</html>
