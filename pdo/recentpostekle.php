<?php
include 'connect.php';
ob_start();
if (isset($_POST['recentpostekle'])) {
    $ekle = $db->prepare("INSERT INTO recentpost SET
        recent_fotograf=:fotograf,
        recent_baslik=:baslik,
        recent_aciklama=:aciklama");
    $insert = $ekle->execute([
        'fotograf' => $_POST['recent_fotograf'],
        'baslik' => $_POST['recent_baslik'],
        'aciklama' => $_POST['recent_aciklama'],
    ]);
    if ($insert) {
        header("Location:../admin_panel/production/recentpost_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/recentpost_ayar.php?durum=no");
    }
}