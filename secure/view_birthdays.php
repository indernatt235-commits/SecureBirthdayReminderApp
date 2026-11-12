
<?php
session_start();
include 'db.php';

// Check login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Get birthdays belonging to the logged-in user
$sql = "SELECT * FROM birthdays WHERE user_id = ? ORDER BY date_of_birth ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Saved Birthdays</title>
</head>

<body>

<h2>My Saved Birthdays</h2>

<?php if ($result->num_rows > 0): ?>

    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Person's Name</th>
            <th>Date of Birth</th>
            <th>Additional Notes</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()): ?>

        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>

            <td><?php echo htmlspecialchars($row['person_name']); ?></td>

            <td><?php echo htmlspecialchars($row['date_of_birth']); ?></td>

            <td>
    <?php echo htmlspecialchars($row['additional_notes'], ENT_QUOTES, 'UTF-8'); ?>
</td>
        </tr>

        <?php endwhile; ?>

    </table>

<?php else: ?>

    <p>No birthdays saved yet.</p>

<?php endif; ?>

<br>

<a href="add_birthday.php">Add Another Birthday</a>

<br><br>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>

<?php
$stmt->close();
?>