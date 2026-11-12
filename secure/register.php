<?php
include 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into database
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        $message = "Registration successful!";
    } else {
        $message = "Error: Username might already exist.";
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Birthday Reminder - Register</title>
</head>

<body>

    <h2>Create Your Account</h2>

    <p><?php echo $message; ?></p>

    <form method="POST">

        <label>Username:</label><br>
        <input type="text" name="username" required>
        <br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required>
        <br><br>

        <button type="submit">Register</button>

    </form>

</body>
</html>