<?php require 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>Tambah Data</title>
</head>
<body>
<div class="container slide-up">
<h2>Tambah Project Baru</h2>
<form action="tambah_proses.php" method="POST">
<label>Nama Project</label>
<input type="text" name="nama" required>


<label>Deskripsi</label>
<textarea name="deskripsi" required></textarea>


<button class="btn" type="submit">Simpan</button>
<a class="btn2" href="index.php">Kembali</a>
</form>
</div>
</body>
</html>