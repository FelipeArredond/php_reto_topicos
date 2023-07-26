<?php
$host = "localhost"; // Change this to your PostgreSQL server's hostname
$dbname = "php_users";
$user = "postgres";
$port = "5432";
$password = "";

// Establish a connection to the database
$pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];

    // Insert the data into the "users" table
    $query = "INSERT INTO users (name, email) VALUES ('$name')";
    $result = pg_query($conn, $query);

    // Check if the query was successful
    if ($result) {
        echo "User registration successful!";
    } else {
        echo "User registration failed: " . pg_last_error($conn);
    }
}

// Close the connection
pg_close($conn);
?>
