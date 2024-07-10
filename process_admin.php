<?php
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

$email = 'hafidzzulgani@gmail.com';
$password_plain = '191919';
$hashed_password = password_hash($password_plain, PASSWORD_DEFAULT);

// Menyimpan data admin ke database
$stmt = $conn->prepare("INSERT INTO admin (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $hashed_password);
$stmt->execute();

$stmt->close();
$conn->close();
?>
