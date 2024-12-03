//Alicia Cook
//Dudleen Paul
//Kensia Saint-Hilaire

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php'; ?>
    <title>Search Properties</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>Search Properties</h1>

<!-- Form for Searching Houses -->
<form action="search.php" method="POST">
    <h2>Search Houses</h2>
    <label for="min_price_house">Minimum Price:</label>
    <input type="number" id="min_price_house" name="min_price_house" required><br>

    <label for="max_price_house">Maximum Price:</label>
    <input type="number" id="max_price_house" name="max_price_house" required><br>

    <label for="bedrooms">Bedrooms:</label>
    <input type="number" id="bedrooms" name="bedrooms" required><br>

    <label for="bathrooms">Bathrooms:</label>
    <input type="number" id="bathrooms" name="bathrooms" required><br>

    <button type="submit" name="search_type" value="house">Search Houses</button>
</form>

<!-- Form for Searching Business Properties -->
<form action="search.php" method="POST">
    <h2>Search Business Properties</h2>
    <label for="min_price_business">Minimum Price:</label>
    <input type="number" id="min_price_business" name="min_price_business" required><br>

    <label for="max_price_business">Maximum Price:</label>
    <input type="number" id="max_price_business" name="max_price_business" required><br>

    <label for="min_size">Minimum Size (sq ft):</label>
    <input type="number" id="min_size" name="min_size" required><br>

    <label for="max_size">Maximum Size (sq ft):</label>
    <input type="number" id="max_size" name="max_size" required><br>

    <button type="submit" name="search_type" value="business">Search Business Properties</button>
</form>
</body>
</html>
