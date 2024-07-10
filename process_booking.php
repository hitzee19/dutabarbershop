<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .error-message {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Processing Booking</h2>
        
        <?php
        // Hubungkan ke database (ganti dengan informasi database Anda)
        $host = 'localhost'; // Host database
        $user = 'root'; // Username database
        $pass = ''; // Password database
        $dbname = 'barbershop'; // Nama database

        // Buat koneksi
        $conn = new mysqli($host, $user, $pass, $dbname);

        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi ke database gagal: " . $conn->connect_error);
        }

        // Ambil nilai dari formulir
        $namaPemesan = $_POST['nama_pemesan'];
        $metodePembayaran = $_POST['metode_pembayaran'];
        $tanggalDatang = $_POST['tanggaldatang'];
        $jenisCashless = isset($_POST['jenis_cashless']) ? $_POST['jenis_cashless'] : '';

        // Query untuk menyimpan data ke database
        $sql = "INSERT INTO pemesanan (nama_pemesan, metode_pembayaran, jenis_cashless, tanggal_datang)
                VALUES ('$namaPemesan', '$metodePembayaran', '$jenisCashless', '$tanggalDatang')";

        if ($conn->query($sql) === TRUE) {
            // Pesan sukses
            echo '<div class="success-message">Pemesanan berhasil disimpan. Terima kasih!</div>';
        } else {
            // Pesan error
            echo '<div class="error-message">Error: ' . $sql . '<br>' . $conn->error . '</div>';
        }

        // Tutup koneksi
        $conn->close();
        ?>

        <a href="index.html" class="btn">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
