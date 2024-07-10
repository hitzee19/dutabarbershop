<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: blog.html"); // Arahkan ke halaman login jika belum login
    exit();
}

// Konten dashboard admin
echo "Selamat datang, " . $_SESSION['admin'];
?>

<a href="logout.php">Logout</a>
