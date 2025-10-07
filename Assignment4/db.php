<?php
$connection = new mysqli("localhost", "root", "", "projectdb");

if ($connection->connect_error) {
    echo "Connection failed";
} else {
    echo "Connected";
}
?>
