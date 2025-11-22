<?php
// admin/index.php
require_once __DIR__ . '/../config.php';
if (isset($_SESSION['user_id'])) header('Location: dashboard.php');

$msg = '';
if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT id, password, name FROM users WHERE email = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $hash, $name);
    if (mysqli_stmt_fetch($stmt)) {
        if (password_verify($password, $hash)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            header('Location: dashboard.php');
            exit;
        } else {
            $msg = 'Email atau password salah.';
        }
    } else {
        $msg = 'Email tidak ditemukan.';
    }
    mysqli_stmt_close($stmt);
}
?>
<!doctype html>
<html><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin Login</title>
<link rel="stylesheet" href="../style.css">
</head><body>
<div class="container" style="max-width:420px;margin:60px auto;">
  <h2 style="margin-bottom:14px">Admin Login</h2>
  <?php if($msg):?><div style="color:#ffb4b4;margin-bottom:12px;"><?=htmlspecialchars($msg)?></div><?php endif;?>
  <form method="post">
    <label>Email</label>
    <input type="email" name="email" required>
    <label>Password</label>
    <input type="password" name="password" required>
    <button class="btn" type="submit">Login</button>
  </form>
</div>
</body></html>
