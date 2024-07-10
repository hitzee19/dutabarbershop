<?php
session_start();

// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti dengan email Anda untuk koneksi MySQL
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "reservasi_hotel"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memproses form login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password_plain = $_POST['password'] ?? '';

    // Melindungi dari SQL injection
    $email = mysqli_real_escape_string($conn, $email);

    // Query SQL untuk memeriksa email yang cocok
    $sql = "SELECT * FROM admin WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika email ditemukan di database
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Memeriksa password dengan password yang di-hash di database
        if (password_verify($password_plain, $row['password'])) {
            // Jika berhasil, simpan email admin ke dalam sesi
            $_SESSION['admin'] = $row['email'];
            header("Location: dashboard_admin.php"); // Redirect ke halaman dashboard admin
            exit();
        }
    }

    // Jika tidak berhasil, kembali ke halaman login
    header("Location: dashboard_admin.php");
    exit();
}

$conn->close(); // Menutup koneksi database
?>
