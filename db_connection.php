//Alicia Cook
//Dudleen Paul
//Kensia Saint-Hilaire

<?php
$servername = "localhost";
$username = "root";
$password = ""; // Leave blank if no password
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
