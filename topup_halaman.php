<?php
//koneksi ke database
include 'config.php';

//menagnkap data yang dikirimkan dari form
$nama = $_POST ['Nama'];
$kode = $_POST ['kode_top_up'];
$tanggal = $_POST ['tanggal_top_up'];
$no = $_POST ['no_hp'];
$nominal = $_POST ['nominal'];

//untuk input data ke database
mysqli_query ("INSERT INTO top_up values ('','$nama','$kode','$tanggal','$no','$nominal')");
header ("Location: index.php");
?>
