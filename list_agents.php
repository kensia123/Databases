//Alicia Cook
//Dudleen Paul
//Kensia Saint-Hilaire

<?php
include 'db_connection.php';
include 'header.php';
$query = "
    SELECT Agent.agentId, Agent.name AS agent_name, Agent.phone, Firm.name AS firm_name, Agent.dateStarted
    FROM Agent
    INNER JOIN Firm ON Agent.firmId = Firm.id;
";
$results = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Agents</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<h1>All Agents</h1>
<?php if ($results->num_rows > 0): ?>
    <table>
        <thead>
        <tr>
            <th>Agent ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Firm</th>
            <th>Date Started</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $results->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['agentId']); ?></td>
                <td><?= htmlspecialchars($row['agent_name']); ?></td>
                <td><?= htmlspecialchars($row['phone']); ?></td>
                <td><?= htmlspecialchars($row['firm_name']); ?></td>
                <td><?= htmlspecialchars($row['dateStarted']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No agents found.</p>
<?php endif; ?>
</body>
</html>
