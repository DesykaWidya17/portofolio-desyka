<?php
require 'koneksi.php';
$nama = $_POST['nama'];
$desk = $_POST['deskripsi'];
mysqli_query($conn, "INSERT INTO portfolio VALUES('', '$nama', '$desk')");
header("Location: index.php");
?>