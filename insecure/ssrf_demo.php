<?php

if (isset($_POST['url'])) {

    $url = $_POST['url'];

    // Intentionally vulnerable SSRF code
    $response = file_get_contents($url);

    if ($response !== false) {
        echo "<h3>Server Response:</h3>";
        echo "<pre>";
        echo htmlspecialchars($response, ENT_QUOTES, 'UTF-8');
        echo "</pre>";
    } else {
        echo "Unable to access the URL.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>SSRF Demonstration</title>
</head>

<body>

    <h2>SSRF Vulnerability Demonstration</h2>

    <form method="POST">

        <label>Enter a URL:</label><br>

        <input type="text" name="url"
               placeholder="http://example.com" required>

        <br><br>

        <button type="submit">Fetch URL</button>

    </form>

</body>
</html>