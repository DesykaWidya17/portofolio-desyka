<?php
include 'config.php';
$id = intval($_GET['id']);
$old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image FROM projects WHERE id={$id}"));
if ($old && $old['image'] && file_exists('uploads/'.$old['image'])) unlink('uploads/'.$old['image']);
mysqli_query($conn, "DELETE FROM projects WHERE id={$id}") or die(mysqli_error($conn));
header('Location: index.php');
exit;
?>
