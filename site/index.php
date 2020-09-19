<?php
ob_start();

include "../pdo/connect.php";

$_GET = array_map(function ($get) {
    return htmlspecialchars(trim($get));
}, $_GET);

if (!isset($_GET['sayfa'])) {
    $_GET['sayfa'] = 'index';
}

switch ($_GET['sayfa']) {
    case 'index':
        require_once 'homepage.php';
        break;
    case 'homepage';
        require_once 'homepage.php';
        break;
    case 'blog';
        require_once 'blog.php';
        break;
}
