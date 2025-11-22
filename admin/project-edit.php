<?php
require_once __DIR__ . '/../functions.php';
require_login();
$id = intval($_GET['id']);
$res = mysqli_query($conn, "SELECT * FROM projects WHERE id=$id");
$data = mysqli_fetch_assoc($res);
?>
<!doctype html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Edit Project</title>
<link rel="stylesheet" href="../style.css">
</head><body>
<header><div class="nav-container"><div class="nav-logo">Admin</div><nav><a href="projects.php">Back</a></nav></div></header>

<div class="container">
  <h2>Edit Project</h2>
  <form action="project_update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <label>Title</label><input type="text" name="title" value="<?=htmlspecialchars($data['title'])?>" required>
    <label>Description</label><textarea name="description" rows="6" required><?=htmlspecialchars($data['description'])?></textarea>
    <label>Tech Stack</label><input type="text" name="tech_stack" value="<?=htmlspecialchars($data['tech_stack'])?>">
    <label>Link</label><input type="text" name="link" value="<?=htmlspecialchars($data['link'])?>">
    <label>Ganti Image (kosong jika tidak)</label><input type="file" name="image" accept="image/*">
    <?php if($data['image']): ?><p>Gambar saat ini:</p><img src="../uploads/<?=htmlspecialchars($data['image'])?>" style="width:160px"><?php endif; ?>
    <button class="btn" type="submit">Update</button>
  </form>
</div>
</body></html>
