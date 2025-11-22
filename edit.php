<?php
require 'koneksi.php';
$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * FROM portfolio WHERE id=$id");
$data = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<title>Edit</title>
</head>
<body>
<div class="container slide-up">
<h2>Edit Project</h2>
<form action="edit_proses.php" method="POST">
<input type="hidden" name="id" value="<?= $data['id']; ?>">


<label>Nama Project</label>
<input type="text" name="nama" value="<?= $data['nama']; ?>" required>


<label>Deskripsi</label>
<textarea name="deskripsi" required><?= $data['deskripsi']; ?></textarea>


<button class="btn" type="submit">Update</button>
<a class="btn2" href="index.php">Batal</a>
</form>
</div>
</body>
</html>