<?php
// Include file konfigurasi
include 'config.php';

// Ambil data dari form
$id_top_up = $_POST['id_top_up'];
$nama = $_POST['Nama'];
$kode_top_up = $_POST['kode_top_up'];
$tanggal_top_up = $_POST['tanggal_top_up'];
$no_hp = $_POST['no_hp'];
$nominal = $_POST['nominal'];

// Query untuk mengupdate data
$query = "UPDATE $topUpTable SET Nama = ?, kode_top_up = ?, tanggal_top_up = ?, no_hp = ?, nominal = ? WHERE id_top_up = ?";

// Prepare statement
$stmt = $conn->prepare($query);

// Bind parameters
$stmt = $conn->prepare("UPDATE top_up SET Nama=?, kode_top_up=?, tanggal_top_up=?, no_hp=?, nominal=? WHERE id_top_up=?");
$stmt->bind_param('ssssdi', $nama, $kode_top_up, $tanggal_top_up, $no_hp, $nominal, $id_top_up);

// Jalankan query
if ($stmt->execute() === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $stmt->error;
}

// Tutup koneksi
$stmt->close();
$conn->close();

// Redirect ke halaman index.php
header('Location: index.php');
?>