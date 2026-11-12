<?php

include 'db.php';

$result = null;
$sql = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $search = $_POST['username'];

    // Intentionally vulnerable SQL query
  $sql = "SELECT id, username FROM users
        WHERE username = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $search);

$stmt->execute();

$result = $stmt->get_result();

    if (!$result) {
        $error = $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SQL Injection Demonstration</title>
</head>

<body>

<h2>SQL Injection Demonstration</h2>

<form method="POST">

    <label>Search Username:</label><br>

    <input type="text" name="username" required>

    <br><br>

    <button type="submit">Search</button>

</form>

<hr>

<?php

if ($result && $result->num_rows > 0) {

    echo "<h3>Search Results:</h3>";

    while ($row = $result->fetch_assoc()) {

        echo "User ID: " . htmlspecialchars($row['id']);
        echo " | Username: " . htmlspecialchars($row['username']);
        echo "<br>";

    }

} else {

    echo "No matching user found.";

}

?>

</body>
</html>