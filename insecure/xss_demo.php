<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $message = $_POST['notes'];

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>XSS Demonstration</title>
</head>

<body>

<h2>Cross-Site Scripting Demonstration</h2>

<form method="POST">

    <label>Enter Additional Notes:</label><br>

    <textarea name="notes" rows="5" cols="40"></textarea>

    <br><br>

    <button type="submit">Display Notes</button>

</form>

<hr>

<h3>Displayed Notes:</h3>

<div>
   <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
</div>

</body>
</html>