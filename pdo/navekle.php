<?php
include 'connect.php';
ob_start();
if (isset($_POST['navekle'])) {
    $ekle = $db->prepare("INSERT INTO nav SET
        nav_tag=:tag");
    $insert = $ekle->execute([
        'tag' => $_POST['nav_tag'],
    ]);
    if ($insert) {
        header("Location:../admin_panel/production/nav_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/nav_ayar.php?durum=no");
    }
}
