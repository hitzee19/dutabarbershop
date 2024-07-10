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

// Mendapatkan data dari form
$nama_kamar = $_POST['nama_kamar'];
$deskripsi_kamar = $_POST['deskripsi_kamar'];
$maksimal_orang = $_POST['maksimal_orang'];
$harga = $_POST['harga'];

// Menyusun SQL untuk memasukkan data ke tabel rooms
$sql = "INSERT INTO rooms (nama_kamar, deskripsi_kamar, maksimal_orang, harga) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $nama_kamar, $deskripsi_kamar, $maksimal_orang, $harga);

if ($stmt->execute()) {
    echo "Kamar berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
