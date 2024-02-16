<?php
// Include file konfigurasi
include 'config.php';

// Pastikan parameter ID telah diterima dari URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Bersihkan ID yang diterima dari kemungkinan serangan SQL Injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Query untuk menghapus data dengan ID yang sesuai
    $query = "DELETE FROM $topUpTable WHERE id_top_up = $id";

    if ($conn->query($query) === TRUE) {
        // Jika penghapusan berhasil, redirect kembali ke halaman utama atau halaman yang sesuai
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
} else {
    // Jika ID tidak ditemukan dalam URL, tampilkan pesan kesalahan
    echo "ID tidak valid";
}

// Tutup koneksi
$conn->close();
?>