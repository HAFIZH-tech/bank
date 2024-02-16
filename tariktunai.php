<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id_top_up = $_POST['id_top_up'];
    $jumlah_tarik = $_POST['jumlah_tarik'];

    // Query untuk mengambil saldo top up
    $querySaldo = "SELECT nominal FROM top_up WHERE id_top_up = ?";
    $stmtSaldo = $conn->prepare($querySaldo);
    $stmtSaldo->bind_param("i", $id_top_up);
    $stmtSaldo->execute();
    $resultSaldo = $stmtSaldo->get_result();

    if ($resultSaldo->num_rows > 0) {
        $rowSaldo = $resultSaldo->fetch_assoc();
        $saldo_top_up = $rowSaldo['nominal'];

        // Pastikan saldo mencukupi sebelum melakukan penarikan tunai
        if ($saldo_top_up >= $jumlah_tarik) {
            // Kurangi saldo top up dengan jumlah yang ditarik
            $saldo_top_up -= $jumlah_tarik;

            // Update saldo top up di database
            $queryUpdate = "UPDATE top_up SET nominal = ? WHERE id_top_up = ?";
            $stmtUpdate = $conn->prepare($queryUpdate);
            $stmtUpdate->bind_param("di", $saldo_top_up, $id_top_up);
            if ($stmtUpdate->execute()) {
                // Jika berhasil, redirect ke halaman tarik tunai sukses
                header("Location: index.php");
                exit();
            } else {
                // Jika gagal mengupdate saldo, tampilkan pesan error
                echo "Error: " . $stmtUpdate->error;
            }
        } else {
            // Jika saldo tidak mencukupi, tampilkan pesan error
            echo "Saldo tidak mencukupi untuk melakukan penarikan tunai.";
        }
    } else {
        // Jika tidak ditemukan data saldo top up, tampilkan pesan error
        echo "Saldo top up tidak ditemukan.";
    }
} else {
    // Jika tidak ada data yang dikirim melalui POST, kembali ke halaman tarik tunai
    header("Location: tarik.php");
    exit();
}

$conn->close();
?>