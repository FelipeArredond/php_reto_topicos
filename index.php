<?php
$host = "localhost"; // e.g., localhost or IP address
$port = "5432"; // Default is 5432
$dbname = "php_users";
$user = "postgres";
$password = "";

try {
    // Create a new PDO connection
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Validate form data
        $name = $_POST["name"] ?? '';

        // You can add more validation logic here as per your requirements

        // Insert data into the database
        $stmt = $pdo->prepare("INSERT INTO users (name) VALUES (:name)");
        $stmt->bindParam(':name', $name);
        $stmt->execute();

        // Redirect to a success page or display a success message
        header("Location: index.php");
        exit();
    }

    // Close the connection when done (optional, as PDO will automatically close it at the end of script execution)
    $pdo = null;
} catch (PDOException $e) {
    // Display error message
    echo "Connection failed: " . $e->getMessage();
    // You can also log the error for further investigation
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>
    <h2>Add User</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <br>
        <input type="submit" value="Add User">
    </form>
</body>
</html>