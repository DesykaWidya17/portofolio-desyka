<?php
// create_admin.php - run once: http://localhost/portofolio-desyka/create_admin.php
require 'config.php';

$name = 'Desyka Admin';
$email = 'admin@desyka.local';
$password_plain = 'AdminPass123!'; // ganti kalau mau

$hash = password_hash($password_plain, PASSWORD_BCRYPT);

// cek exist
$stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
if (mysqli_stmt_num_rows($stmt) > 0) {
    echo 'Admin sudah ada.';
    exit;
}
mysqli_stmt_close($stmt);

$stmt = mysqli_prepare($conn, "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'admin')");
mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hash);
if (mysqli_stmt_execute($stmt)) {
    echo 'Admin dibuat. Email: ' . htmlspecialchars($email) . '<br>';
    echo 'Password: ' . htmlspecialchars($password_plain) . '<br>';
    echo 'Hapus file create_admin.php setelah ini.';
} else {
    echo 'Gagal: ' . mysqli_error($conn);
}
mysqli_stmt_close($stmt);
?>
