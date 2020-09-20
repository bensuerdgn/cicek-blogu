<?php
include 'connect.php';
ob_start();
if ($_GET['latestpostsil'] == 'ok') {
    $sil = $db->prepare('DELETE FROM latestpost WHERE latestpost_id=:latestpost_id');
    $kontrol = $sil->execute([
        'latestpost_id' => $_GET['latestpost_id'],
    ]);
    if ($kontrol) {
        header("Location:../admin_panel/production/latestpost_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/latestpost_ayar.php?durum=no");
    }
}