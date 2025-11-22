<?php
require_once __DIR__ . '/../functions.php';
require_login();
?>
<!doctype html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Create Project</title>
<link rel="stylesheet" href="../style.css">
</head><body>
<header>
  <div class="nav-container"><div class="nav-logo">Admin</div><nav><a href="projects.php">Back</a></nav></div>
</header>

<div class="container">
  <h2>Tambah Project</h2>
  <form action="project_store.php" method="post" enctype="multipart/form-data">
    <label>Title</label><input type="text" name="title" required>
    <label>Description</label><textarea name="description" rows="6" required></textarea>
    <label>Tech Stack (comma separated)</label><input type="text" name="tech_stack">
    <label>Link</label><input type="text" name="link">
    <label>Image</label><input type="file" name="image" accept="image/*">
    <button class="btn" type="submit">Simpan</button>
  </form>
</div>
</body></html>
