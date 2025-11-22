<?php
require_once __DIR__ . '/../functions.php';
require_login();
$id = intval($_GET['id']);
$old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image FROM projects WHERE id={$id}"));
if ($old && $old['image'] && file_exists(__DIR__ . '/../uploads/'.$old['image'])) unlink(__DIR__ . '/../uploads/'.$old['image']);
mysqli_query($conn, "DELETE FROM projects WHERE id={$id}");
header('Location: projects.php');
exit;
