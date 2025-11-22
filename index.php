<?php
require 'koneksi.php';
$items = mysqli_query($conn, "SELECT * FROM portfolio ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Portfolio CRUD</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h2>Portfolio CRUD</h2>
<a class="btn" href="tambah.php">+ Tambah Project</a>
</header>


<div class="container fade-in">
<h2>Daftar Project</h2>
<table>
<tr>
<th>Nama Project</th>
<th>Deskripsi</th>
<th>Aksi</th>
</tr>
<?php while ($row = mysqli_fetch_assoc($items)) : ?>
<tr>
<td><?= $row['nama']; ?></td>
<td><?= $row['deskripsi']; ?></td>
<td>
<a class="edit" href="edit.php?id=<?= $row['id']; ?>">Edit</a>
<a class="hapus" href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
</td>
</tr>
<?php endwhile; ?>
</table>
</div>
</body>
</html>