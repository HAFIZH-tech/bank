<?php
// Mulai sesi
session_start();

// Hancurkan semua variabel sesi
session_destroy();

// Redirect ke halaman login atau halaman lain yang sesuai
header("Location: login.php");
exit;
?>