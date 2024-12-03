//Alicia Cook
//Dudleen Paul
//Kensia Saint-Hilaire

<?php
include 'db_connection.php';
include 'header.php';
$query = $_POST['query'];
$results = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manual Query Results</title>
</head>
<body>
<h1>Manual Query Results</h1>
<?php if ($results && $results->num_rows > 0): ?>
    <table>
        <thead>
        <tr>
            <?php while ($field = $results->fetch_field()): ?>
                <th><?= htmlspecialchars($field->name); ?></th>
            <?php endwhile; ?>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $results->fetch_assoc()): ?>
            <tr>
                <?php foreach ($row as $value): ?>
                    <td><?= htmlspecialchars($value); ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No results found or invalid query.</p>
<?php endif; ?>
</body>
</html>
