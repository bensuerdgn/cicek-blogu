<?php
include 'connect.php';
ob_start();
if ($_GET['sectionsil'] == 'ok') {
    $sil = $db->prepare('DELETE FROM section WHERE section_id=:section_id');
    $kontrol = $sil->execute([
        'section_id' => $_GET['section_id'],
    ]);
    if ($kontrol) {
        header("Location:../admin_panel/production/section_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/section_ayar.php?durum=no");
    }
}