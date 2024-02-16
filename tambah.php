<?php
include "koneksi.php";

// Mendapatkan data dari form
$nama = $_POST['nama'];
$kode_top_up = $_POST['kode_top_up'];
$tanggal_top_up = $_POST['tanggal_top_up'];
$no_hp = $_POST['no_hp'];
$nominal = $_POST['nominal'];

// Memasukkan data ke database
$query = "INSERT INTO top_up (Nama, kode_top_up, tanggal_top_up, no_hp, nominal) 
VALUES ('$nama', '$kode_top_up', '$tanggal_top_up', '$no_hp', $nominal)";
$result = mysqli_query($koneksi, $query);

// Mengecek apakah data berhasil ditambahkan
if ($result) {
    echo "<script>alert('Data berhasil ditambahkan!'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Data gagal ditambahkan!'); window.location='tambah.php';</script>";
}
?>