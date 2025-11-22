<?php include 'config.php'; ?>
<!doctype html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Projects</title>
<link rel="stylesheet" href="style.css"></head><body>
<header>
  <div class="nav-container"><div class="nav-logo">MyPortofolio</div><nav><a href="home.php">Home</a><a href="admin/index.php">Admin</a></nav></div>
</header>

<div class="container">
  <h2>All Projects</h2>
  <div class="projects-grid">
    <?php
      $res = mysqli_query($conn, "SELECT * FROM projects ORDER BY id DESC");
      while($p = mysqli_fetch_assoc($res)):
    ?>
      <div class="project-card">
        <?php if($p['image']): ?><img src="uploads/<?=htmlspecialchars($p['image'])?>"><?php endif;?>
        <h3><?=htmlspecialchars($p['title'])?></h3>
        <p><?=nl2br(htmlspecialchars(substr($p['description'],0,200)))?></p>
      </div>
    <?php endwhile;?>
  </div>
</div>
</body></html>
