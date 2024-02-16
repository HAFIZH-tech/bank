<!-- process_login.php -->
<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND level = '$level'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['level'] = $user['level'];
        $_SESSION['username'] = $user['username'];

        // Arahkan ke halaman sesuai level
        switch ($level) {
            case 'manajemen':
                header("Location: index.php");
                break;
            case 'administrator':
                header("Location: kantin.php");
                break;
            case 'siswa':
                header("Location: index_siswa.php");
                break;
            default:
                // Arahkan ke halaman default jika level tidak dikenali
                header("Location: index.php");
                break;
        }
        exit();
    } else {
        header("Location: login.php?error=InvalidCredentials");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

$conn->close();
?>