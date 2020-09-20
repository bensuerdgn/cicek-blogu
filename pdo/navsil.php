<?php
include 'connect.php';
ob_start();
if ($_GET['navsil'] == 'ok') {
    $sil = $db->prepare('DELETE FROM nav WHERE nav_id=:nav_id');
    $kontrol = $sil->execute([
        'nav_id' => $_GET['nav_id'],
    ]);
    if ($kontrol) {
        header("Location:../admin_panel/production/nav_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/nav_ayar.php?durum=no");
    }
}