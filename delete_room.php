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

// Mengambil ID kamar yang akan dihapus
$id = $_POST['id'];

// Menyiapkan query untuk menghapus kamar
$sql = "DELETE FROM rooms WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

// Menjalankan query dan memeriksa keberhasilan
if ($stmt->execute()) {
    echo "Kamar berhasil dihapus";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$stmt->close();
$conn->close();
?>
