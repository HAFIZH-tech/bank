<!DOCTYPE html>
<html lang="eng">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tarik Tunai</title>
  <link rel="stylesheet" href="tarik.css">
</head>
<body>
  <form action="tariktunai.php" method="POST">
    <div class="form">
    <h2> Tarik Tunai </h2>
    <form action="tariktunai.php" method="POST">
    <div class='tabel'>
        <!-- Formulir untuk menambahkan tarik tunai -->
            <label for="id_top_up">ID:</label>
            <input type="text" name="id_top_up" required>

            <label for="jumlah_tarik">Jumlah Tarik:</label>
            <input type="number" name="jumlah_tarik" required>

            <button type="submit">Tarik Tunai</button>
      </form>

        <!-- Tabel yang sudah ada -->
        <?php
        // ... (kode PHP yang sudah ada)
        ?>

    </div>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</body>
</html>

    </div>
  </form>