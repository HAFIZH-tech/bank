<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "database_fintech";

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Tabel transaksi
$transaksiTable = "transaksi";
     
// Tabel top up
$topUpTable = "top_up";

// Tabel siswa
$siswaTable = "siswa";

// Tabel manajemen
$manajemenTable = "manajemen";

// Tabel barang
$barangTable = "barang";

?>