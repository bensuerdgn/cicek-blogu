<?php
include 'connect.php';
ob_start();
if ($_GET['recentpostsil'] == 'ok') {
    $sil = $db->prepare('DELETE FROM recentpost WHERE recentpost_id=:recentpost_id');
    $kontrol = $sil->execute([
        'recentpost_id' => $_GET['recentpost_id'],
    ]);
    if ($kontrol) {
        header("Location:../admin_panel/production/recentpost_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/recentpost_ayar.php?durum=no");
    }
}