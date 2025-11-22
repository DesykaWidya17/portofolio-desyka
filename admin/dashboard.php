<?php
require_once __DIR__ . '/../functions.php';
require_login();
?>
<!doctype html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="../style.css">
</head><body>
<header>
  <div class="nav-container">
    <div class="nav-logo">Admin - <?=htmlspecialchars($_SESSION['user_name'])?></div>
    <nav>
      <a href="projects.php">Projects</a>
      <a href="logout.php">Logout</a>
    </nav>
  </div>
</header>

<div class="container">
  <h2>Dashboard</h2>
  <p>Selamat datang, <?=htmlspecialchars($_SESSION['user_name'])?> — gunakan menu Projects untuk CRUD.</p>
</div>
</body></html>
