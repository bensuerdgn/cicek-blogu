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
    case 'section_detay';
        require_once 'section_detay.php';
        break;
    case 'recentpost_detay';
        require_once 'recentpost_detay.php';
        break;
    case 'latestpost_detay';
        require_once 'latestpost_detay.php';
        break;
    case 'tag_detay';
        require_once 'tag_detay.php';
        break;
    case 'notfound';
        require_once 'notfound.php';
        break;
}
