<?php
include 'connect.php';
ob_start();
if (isset($_POST['footertagekle'])) {
    $ekle = $db->prepare("INSERT INTO footertags SET
        footer_tag=:tag");
    $insert = $ekle->execute([
        'tag' => $_POST['footer_tag'],
    ]);
    if ($insert) {
        header("Location:../admin_panel/production/footertags_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/footertags_ayar.php?durum=no");
    }
}
