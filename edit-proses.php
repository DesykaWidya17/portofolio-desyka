<?php
require 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$desk = $_POST['deskripsi'];
mysqli_query($conn, "UPDATE portfolio SET nama='$nama', deskripsi='$desk' WHERE id=$id");
header('Location: index.php');
?>