<?php
// config.php
session_start();

$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'portofolio_db';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
$base = '/portofolio-desyka'; // ubah jika folder beda
?>
