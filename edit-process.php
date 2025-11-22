<?php
include 'config.php';
$id = intval($_POST['id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$link = mysqli_real_escape_string($conn, $_POST['link']);

$imgSQL = '';
if (!empty($_FILES['image']['name'])) {
    if (!is_dir('uploads')) mkdir('uploads', 0755);
    $imageName = time() . '_' . preg_replace('/[^a-z0-9.\-_]+/i','', $_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $imageName);
    $old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image FROM projects WHERE id={$id}"));
    if ($old && $old['image'] && file_exists('uploads/'.$old['image'])) unlink('uploads/'.$old['image']);
    $imgSQL = ", image='{$imageName}'";
}

$sql = "UPDATE projects SET title='{$title}', description='{$description}', link='{$link}' {$imgSQL} WHERE id={$id}";
mysqli_query($conn, $sql) or die(mysqli_error($conn));
header('Location: index.php');
exit;
?>
