//Alicia Cook
//Dudleen Paul
//Kensia Saint-Hilaire

<?php
include 'db_connection.php';
include 'header.php';
$search_type = $_POST['search_type'];
$min_price = $_POST['min_price'];
$max_price = $_POST['max_price'];

if ($search_type == 'house') {
    $bedrooms = $_POST['bedrooms'];
    $bathrooms = $_POST['bathrooms'];

    $query = "
        SELECT Property.address, Property.price, House.bedrooms, House.bathrooms, House.size
        FROM Property
        INNER JOIN House ON Property.address = House.address
        WHERE Property.price BETWEEN $min_price AND $max_price
        AND House.bedrooms = $bedrooms
        AND House.bathrooms = $bathrooms;
    ";
} else {
    $min_size = $_POST['min_size'];
    $max_size = $_POST['max_size'];

    $query = "
        SELECT Property.address, Property.price, BusinessProperty.type, BusinessProperty.size
        FROM Property
        INNER JOIN BusinessProperty ON Property.address = BusinessProperty.address
                WHERE Property.price BETWEEN $min_price AND $max_price
        AND BusinessProperty.size BETWEEN $min_size AND $max_size;
    ";
}

$results = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>Search Results</h1>
<?php if ($results->num_rows > 0): ?>
    <table>
        <thead>
        <tr>
            <?php while ($field = $results->fetch_field()): ?>
                <th><?= htmlspecialchars($field->name) ?></th>
            <?php endwhile; ?>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $results->fetch_assoc()): ?>
            <tr>
                <?php foreach ($row as $value): ?>
                    <td><?= htmlspecialchars($value) ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No results found.</p>
<?php endif; ?>
</body>
</html>
