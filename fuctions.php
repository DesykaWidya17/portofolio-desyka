<?php
// functions.php
require_once __DIR__ . '/config.php';

function is_admin() {
    return isset($_SESSION['user_id']);
}

function require_login() {
    if (!is_admin()) {
        header('Location: index.php'); // atau admin/index.php (login)
        exit;
    }
}
