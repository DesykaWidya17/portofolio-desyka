<?php
require_once __DIR__ . '/../functions.php';
require_login();

$id = intval($_POST['id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$tech = mysqli_real_escape_string($conn, $_POST['tech_stack']);
$link = mysqli_real_escape_string($conn, $_POST['link']);

$imgSQL = '';
if (!empty($_FILES['image']['name'])) {
    if (!is_dir(__DIR__ . '/../uploads')) mkdir(__DIR__ . '/../uploads', 0755);
    $imageName = time().'_'.preg_replace('/[^a-z0-9.\-_]+/i','', $_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../uploads/' . $imageName);
    $old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image FROM projects WHERE id={$id}"));
    if ($old && $old['image'] && file_exists(__DIR__ . '/../uploads/'.$old['image'])) unlink(__DIR__ . '/../uploads/'.$old['image']);
    $imgSQL = ", image='".mysqli_real_escape_string($conn,$imageName)."'";
}

$sql = "UPDATE projects SET title='".mysqli_real_escape_string($conn,$title)."', description='".mysqli_real_escape_string($conn,$description)."', link='".mysqli_real_escape_string($conn,$link)."', tech_stack='".mysqli_real_escape_string($conn,$tech)."' {$imgSQL} WHERE id={$id}";
mysqli_query($conn, $sql);
header('Location: projects.php');
exit;
