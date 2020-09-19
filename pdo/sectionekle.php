<?php
include 'connect.php';
ob_start();
if (isset($_POST['sectionekle'])) {
    $ekle = $db->prepare("INSERT INTO section SET
        section_fotograf=:fotograf,
        section_baslik=:baslik,
        section_aciklama=:aciklama");
    $insert = $ekle->execute([
        'fotograf' => $_POST['section_fotograf'],
        'baslik' => $_POST['section_baslik'],
        'aciklama' => $_POST['section_aciklama'],
    ]);
    if ($insert) {
        header("Location:../admin_panel/production/section_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/section_ayar.php?durum=no");
    }
}