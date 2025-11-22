<?php
require_once __DIR__ . '/../functions.php';
require_login();

$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$tech = mysqli_real_escape_string($conn, $_POST['tech_stack']);
$link = mysqli_real_escape_string($conn, $_POST['link']);

$imageName = null;
if (!empty($_FILES['image']['name'])) {
    if (!is_dir(__DIR__ . '/../uploads')) mkdir(__DIR__ . '/../uploads', 0755);
    $imageName = time().'_'.preg_replace('/[^a-z0-9.\-_]+/i','', $_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../uploads/' . $imageName);
}

$stmt = mysqli_prepare($conn, "INSERT INTO projects (title, description, link, image, tech_stack) VALUES (?,?,?,?,?)");
mysqli_stmt_bind_param($stmt, "sssss", $title, $description, $link, $imageName, $tech);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header('Location: projects.php');
exit;
