<?php
ob_start();

include "../pdo/connect.php";
header('Location:homepage');
$_GET = array_map(function ($get) {
    return htmlspecialchars(trim($get));
}, $_GET);

if (!isset($_GET['sayfa'])) {
    $_GET['sayfa'] = 'index';
}


