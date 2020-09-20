<?php
include 'connect.php';
ob_start();
if (isset($_POST['latestpostekle'])) {
    $ekle = $db->prepare("INSERT INTO latestpost SET
        latest_fotograf=:fotograf,
        latest_baslik=:baslik,
        latest_aciklama=:aciklama");
    $insert = $ekle->execute([
        'fotograf' => $_POST['latest_fotograf'],
        'baslik' => $_POST['latest_baslik'],
        'aciklama' => $_POST['latest_aciklama'],
    ]);
    if ($insert) {
        header("Location:../admin_panel/production/latestpost_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/latestpost_ayar.php?durum=no");
    }
}