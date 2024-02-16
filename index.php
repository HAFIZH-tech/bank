<?php
session_start();

// Pastikan pengguna telah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil nilai username dari sesi
$username = $_SESSION['username'];
$level = $_SESSION['level'];
?>
<!DOCTYPE html>
<html lang="eng">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DASHBOARD</title>
  <link rel="stylesheet" href="style.css">
  <script src="main.js"></script>
</head>
<body>

<header>
    <nav>
        <h1>Admin</h1>
        <span>
          <a href="#" class="active">Home</a>
          <a href="#">Database</a>
          <a href="addtopup.php">Bank Mini</a>
          <a href="proseslogout.php">Logout</a>
        </span>
      </nav>
  </header>
    <section id="Home">
        <h1>Welcome <?php echo $username;?></h1>
        <!-- Clouds -->
        <img src="./leftCloud.png" id="leftCloud" alt="">
        <img src="./mainCloud.png" id="mainCloud" alt="">
        <img src="./rightCloud.png" id="rightCloud" alt="">
        <!-- Background -->
        <img src="./Layer 1.png" id="Mountain1" alt="">
        <img src="./Layer 2.png" id="Mountain2" alt="">
    </section>
    <section id="About">
     
        <h1>Bank Mini</h1>
        <div class="topup">
          <span class="header-topup">
            <i class='bx bx-wallet'></i>
          </span>
            <h3>Your Wallet Balance</h3>
          <h4>Rp 
            <?php 
            // Include file konfigurasi
            include 'config.php';
        
            // Query untuk mengambil total nominal dari tabel top_up
            $queryTotal = "SELECT SUM(nominal) AS total_nominal FROM $topUpTable";
            $resultTotal = $conn->query($queryTotal);
          
            // Ambil nilai total nominal
            if ($resultTotal->num_rows > 0) {
                $rowTotal = $resultTotal->fetch_assoc();
                $totalNominal = $rowTotal['total_nominal'];
                // Tampilkan total nominal dengan format angka yang sesuai
                echo number_format($totalNominal, 2, ',', '.');
            } else {
                echo '0';
            }
            ?>
          </h4>
          <div class="lingkaran">
            <div class="top">
              <button class="popup" onclick=tampilkanForm()>
                <i class='bx bx-dollar'></i>
              </button>
            </div>
            <p class="text"> Topup </P> 
       
            <div class="top">
              <button class="popup" onclick=redirectWithDraw()>
                <i class='bx bxs-chart'></i>
              </button>
            </div>
            <p class="tarik"> Tarik </p>
           
        </div>

    <form action="" method="POST">
      <div class="form">
        <span class="icon-close" onclick="hide()">
          <i class='bx bx-x'></i>
        </span>  
      <h2>Topup</h2>
        <div class="input">
          <span class="icon">
            <i class='bx bx-user' ></i>
          </span>
          <input type="text" name="Nama" required>
          <label for="nama"> Nama </label>
        </div>

        <div class="input">
          <span class="icon">
            <i class='bx bx-money'></i>
          </span>
          <input type="text" name="nominal" required>
          <label for="nominal"> Nominal </label>
        </div>

        <div class="input">
          <span class="icon">
            <i class='bx bx-barcode' ></i>
          </span>
          <input type="text" name="kode_top_up" required>
          <label for="kode"> Kode </label>
        </div>

        <div class="input">
          <span class="icon">
            <i class='bx bx-phone' ></i>
          </span>
          <input type="number" name="no_hp" required>
          <label for="nomor"> Nomor Hp </label>
        </div>

        <div class="input">
          <span class="icon">
            <i class='bx bxs-calendar' ></i>
          </span>
          <input type="date" name="tanggal_top_up" required>
        </div>
        <div class="menu">
          <button class="registerbox" name="proses">Topup</button>
        </div>
    <?php
    // Pastikan file ini berada di dalam file yang sama dengan form (topup_halaman.php)
    // Periksa apakah tombol "proses" telah ditekan
    if (isset($_POST['proses'])) {
    // Masukkan data dari form ke dalam variabel
    $nama = $_POST['Nama'];
    $kodeTopUp = $_POST['kode_top_up'];
    $tanggal = $_POST['tanggal_top_up'];
    $no = $_POST['no_hp'];
    $nominal = $_POST['nominal'];

    // Koneksi ke database
    include 'config.php';
    
    // Buat query untuk mengambil ID terbesar dari tabel top_up
    $queryMaxId = "SELECT MAX(id_top_up) as max_id FROM $topUpTable";
    $resultMaxId = $conn->query($queryMaxId);
    $rowMaxId = $resultMaxId->fetch_assoc();

    // Query INSERT dengan mengabaikan kolom ID dan Kode Top Up
    $sql = "INSERT INTO top_up (Nama, kode_top_up, tanggal_top_up, no_hp, nominal) 
            VALUES ('$nama', '$kodeTopUp', '$tanggal', '$no', '$nominal')";

    // Jalankan query
    if ($conn->query($sql) === TRUE) {
        // Jika query berhasil, alihkan ke halaman index.php
        header("location: index.php");
        echo "New record created successfully";
    } else {
        // Jika query gagal, tampilkan pesan error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
}
?>
      </form>  
    </section>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</body>
</html>