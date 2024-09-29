<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

include 'config.php'; // Pastikan ini mengarah ke file config.php yang benar

$query = "SELECT * FROM students"; // Ganti 'students' dengan nama tabel Anda
$result = $conn->query($query);

$students = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

// Mengembalikan data dalam format JSON
echo json_encode($students);

$conn->close();

