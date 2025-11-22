<?php
require_once __DIR__ . '/../functions.php';
require_login();

$res = mysqli_query($conn, "SELECT * FROM projects ORDER BY id DESC");
?>
<!doctype html>
<html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Projects - Admin</title>
<link rel="stylesheet" href="../style.css">
</head><body>
<header>
  <div class="nav-container">
    <div class="nav-logo">Admin</div>
    <nav><a href="dashboard.php">Dashboard</a><a href="logout.php">Logout</a></nav>
  </div>
</header>

<div class="container">
  <div class="actions">
    <h2>Projects</h2>
    <a class="btn" href="project_create.php">+ New Project</a>
  </div>

  <table>
    <thead><tr><th>Image</th><th>Title</th><th>Tech</th><th>Created</th><th>Actions</th></tr></thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($res)): ?>
      <tr>
        <td style="width:120px;"><?php if($row['image']):?><img src="../uploads/<?=htmlspecialchars($row['image'])?>" style="width:100px;height:60px;object-fit:cover"><?php endif;?></td>
        <td><?=htmlspecialchars($row['title'])?></td>
        <td><?=htmlspecialchars($row['tech_stack'])?></td>
        <td><?=htmlspecialchars($row['created_at'])?></td>
        <td>
          <a class="edit" href="project_edit.php?id=<?=$row['id']?>">Edit</a>
          <a class="hapus" href="project_delete.php?id=<?=$row['id']?>" onclick="return confirm('Hapus project?')">Delete</a>
        </td>
      </tr>
      <?php endwhile;?>
    </tbody>
  </table>
</div>
</body></html>
