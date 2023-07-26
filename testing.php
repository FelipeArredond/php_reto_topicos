<!DOCTYPE html>

<html>

<body>

<?php

echo "My first PHP script!";

$db = pg_connect("host=localhost dbname=php_users user=postgres password=");

if ($db) {
    echo 'Connection attempt succeeded.';
} else {
    echo 'Connection attempt failed.';
}

?>

</body>