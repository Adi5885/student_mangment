<?php
// backend/db.php
$conn = new mysqli("localhost", "root", "", "student_db", 3307);

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed"]));
}
?>
