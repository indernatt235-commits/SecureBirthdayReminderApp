
<?php
session_start();
include 'db.php';

// Check login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $person_name = trim($_POST['person_name']);
    $date_of_birth = $_POST['date_of_birth'];
    $additional_notes = trim($_POST['additional_notes']);

    // Insert birthday into database
    $sql = "INSERT INTO birthdays
            (user_id, person_name, date_of_birth, additional_notes)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "isss",
        $_SESSION['user_id'],
        $person_name,
        $date_of_birth,
        $additional_notes
    );

    if ($stmt->execute()) {
        $message = "Birthday saved successfully!";
    } else {
        $message = "Error saving birthday.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Birthday</title>
</head>

<body>

    <h2>Add a Birthday</h2>

    <p><?php echo htmlspecialchars($message); ?></p>

    <form method="POST">

        <label>Person's Name:</label><br>
        <input type="text" name="person_name" required>
        <br><br>

        <label>Date of Birth:</label><br>
        <input type="date" name="date_of_birth" required>
        <br><br>

        <label>Additional Notes:</label><br>
        <textarea name="additional_notes"></textarea>
        <br><br>

        <button type="submit">Save Birthday</button>

    </form>

    <br>

    <a href="dashboard.php">Back to Dashboard</a>

</body>
</html>