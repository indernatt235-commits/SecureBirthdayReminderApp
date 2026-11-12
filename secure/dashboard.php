<?php
include 'security_headers.php';
session_start();

// Check whether the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
    <title>Birthday Reminder Dashboard</title>
</head>

<body>

    <h1>Welcome to Birthday Reminder!</h1>

    <h2>Hello, <?php echo htmlspecialchars($username); ?>!</h2>

    <p>Welcome to your personal birthday reminder dashboard.</p>

    <hr>

    <h3>What would you like to do?</h3>

    <a href="add_birthday.php">Add a Birthday</a>

    <br><br>

    <a href="view_birthdays.php">View All Birthdays</a>

    <br><br>

    <a href="logout.php">Logout</a>

</body>
</html>