<?php
// Konfigurasi database
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "reservasi_hotel"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari tabel rooms
$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

$rooms = array();

if ($result->num_rows > 0) {
    // Menyimpan data setiap baris ke dalam array
    while($row = $result->fetch_assoc()) {
        $rooms[] = $row;
    }
}

// Mengembalikan data sebagai JSON
header('Content-Type: application/json');
echo json_encode($rooms);

// Menutup koneksi
$conn->close();
?>
