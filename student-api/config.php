<?php
$host = 'localhost';
$user = 'root'; // User default XAMPP adalah root
$password = ''; // Kosongkan jika tidak ada password
$dbname = 'student_records';

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

