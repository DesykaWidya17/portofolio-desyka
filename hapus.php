<?php
require 'koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM portfolio WHERE id=$id");
header('Location: index.php');
?>