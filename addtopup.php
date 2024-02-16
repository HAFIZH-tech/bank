<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Top Up</title>
    <link rel="stylesheet" href="add.css">
<body>
    <h1>Data Topup</h1>
    <div class='tabel'>
    <?php
    // Include file konfigurasi
    include 'config.php';

    // Query untuk mengambil data dari tabel yang disimpan dalam variabel $topUpTable
    $query = "SELECT * FROM $topUpTable";
    $resultTopUp = $conn->query($query);
  
    // Tampilkan data dari baris tersebut
    if ($resultTopUp->num_rows > 0) {
  
    echo "<table>
    <thead>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Kode Top Up</th>
      <th>Tanggal Top Up</th>
      <th>Nomor HP</th>
      <th>Nominal</th>
      <th>Action</th>
    </tr>
    ";

    // Inisialisasi total nominal
    $totalNominal = 0;

    
    // Loop untuk menampilkan setiap baris data
    while ($rowTopUp = $resultTopUp->fetch_assoc()) {

    // Ubah format tanggal dari "YYYY-MM-DD" menjadi "Bulan DD YYYY"
    $formattedDate = date("j F Y", strtotime($rowTopUp['tanggal_top_up']));

    // Ubah format nominal dengan menambahkan titik setiap tiga digit
    $formattedNominal = number_format($rowTopUp['nominal'], 0, ',', '.');
    echo "<tr>";
    echo "<td class='id'>" . $rowTopUp['id_top_up'] . "</td>";
    echo "<td class='nama'>" . $rowTopUp['Nama'] . "</td>";
    echo "<td class='kode'>" . $rowTopUp['kode_top_up'] . "</td>";
    echo "<td class='tanggal'>" . $formattedDate  . "</td>";
    echo "<td class='nomor'>" . $rowTopUp['no_hp'] . "</td>";
    echo "<td class='nominal'>" . $formattedNominal . "</td>";
    
    echo "<td class='aksi'>
      <a href='edit.php?id=" . $rowTopUp['id_top_up'] . "'>
        <span class='add'> 
          <i class='bx bxs-edit-alt'></i>
        </span>
      </a> |
      <a href='delete.php?id=" . $rowTopUp['id_top_up'] . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">
        <span class='add'> 
          <i class='bx bxs-trash'></i>
        </span>  
      </a>
    </td>
    </tr>";

    // Tambahkan nominal ke totalNominal
    // Ubah format nominal dengan menambahkan "Rp" dan titik setiap tiga digit
    $totalNominal += $rowTopUp['nominal'];

    }

    echo "</table>";
       
    // Tampilkan total nominal di bawah tabel
    echo "<table>";
    echo "<tr>";
    echo "<td colspan='5' style='text-align: center;'>Total Nominal:</td>";
    echo "<td class='nominal'>" . "Rp " . number_format($totalNominal, 0, ',', '.') . "</td>";
    echo "</tr>";
    echo "</table>";

    } else {
      echo  "0 results";
    }

     // Tutup koneksi
     $conn->close();
     ?>
     </div>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</body>
</html>