<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost:3001"); // Ubah sesuai dengan port frontend Anda
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include 'config.php'; // Pastikan ini mengarah ke file config.php yang benar

$data = json_decode(file_get_contents("php://input"), true);

// Pastikan semua field diisi
if (isset($data['nama'], $data['nim'], $data['universitas'], $data['noHpEmail'], $data['kelompok'], $data['proyek'], $data['github'])) {
    $nama = $data['nama'];
    $nim = $data['nim'];
    $universitas = $data['universitas'];
    $noHpEmail = $data['noHpEmail'];
    $kelompok = $data['kelompok'];
    $proyek = $data['proyek'];
    $github = $data['github'];

    // Masukkan data ke dalam database
    $query = "INSERT INTO students (nama, nim, universitas, noHpEmail, kelompok, proyek, github) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssss", $nama, $nim, $universitas, $noHpEmail, $kelompok, $proyek, $github);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Data berhasil ditambahkan!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Gagal menambahkan data."]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Data tidak lengkap."]);
}

$conn->close();
