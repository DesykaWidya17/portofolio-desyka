<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Tambah Project</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="container" data-aos>
    <h2>Tambah Project Baru</h2>
    <form action="create_process.php" method="POST" enctype="multipart/form-data">
        <label>Judul</label>
        <input type="text" name="title" required />

        <label>Deskripsi</label>
        <textarea name="description" rows="6" required></textarea>

        <label>Link (opsional)</label>
        <input type="text" name="link" />

        <label>Gambar (opsional)</label>
        <input type="file" name="image" accept="image/*" />

        <button class="btn" type="submit">Simpan</button>
        <a class="btn2" href="index.php">Batal</a>
    </form>
</div>
</body>
</html>
