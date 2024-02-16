<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Topup</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
  <?php
  // Include file konfigurasi
  include 'config.php';

  // Ambil ID top up dari parameter URL
  $id_top_up = $_GET['id'];

  // Query untuk mengambil data top up berdasarkan ID
  $query = "SELECT * FROM $topUpTable WHERE id_top_up = $id_top_up";

  // Mengeksekusi query dan menangani kesalahan jika terjadi
  $result = $conn->query($query);
  if (!$result) {
      // Jika terjadi kesalahan, tampilkan pesan kesalahan
      echo "Error executing query: " . $conn->error;
  } else {
      // Lakukan logika Anda jika query berhasil dieksekusi
      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          // Inisialisasi variabel dengan nilai default jika tidak ada dalam $_POST
          $id_top_up = isset($_POST['id_top_up']) ? $_POST['id_top_up'] : $row['id_top_up']; 
          $nama = isset($_POST['Nama']) ? $_POST['Nama'] : $row['Nama']; 
          $kode_top_up = isset($_POST['kode_top_up']) ? $_POST['kode_top_up'] : $row['kode_top_up']; 
          $tanggal_top_up = isset($_POST['tanggal_top_up']) ? $_POST['tanggal_top_up'] : $row['tanggal_top_up']; 
          $no_hp = isset($_POST['no_hp']) ? $_POST['no_hp'] : $row['no_hp']; 
          $nominal = isset($_POST['nominal']) ? $_POST['nominal'] : $row['nominal']; 
          // Selanjutnya, Anda bisa melanjutkan dengan menampilkan form untuk mengedit data
          ?>

          <?php
      } else {
          echo "Data tidak ditemukan";
      }
  }
  ?>
    <form action="update.php" method="post" class="form">
        <h2>Edit Topup</h2>
        <input type="hidden" name="id_top_up" value="<?php echo $id_top_up; ?>">
        <label for="Nama"> Nama: </label>
        <input type="text" id="Nama" name="Nama" value="<?php echo $nama; ?>">
        <br>
        <label for="kode_top_up">Kode Top Up:</label>
        <input type="text" id="kode_top_up" name="kode_top_up" value="<?php echo $kode_top_up; ?>">
        <br>
        <label for="tanggal_top_up">Tanggal Top Up:</label>
        <input type="date" id="tanggal_top_up" name="tanggal_top_up" value="<?php echo $tanggal_top_up; ?>">
        <br>
        <label for="no_hp">No HP:</label>
        <input type="text" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>">
        <br>
        <label for="nominal">Nominal:</label>
        <input type="number" id="nominal" name="nominal" value="<?php echo $nominal; ?>">
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>