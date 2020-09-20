<?php
include 'connect.php';
ob_start();
if ($_GET['footertagsil'] == 'ok') {
    $sil = $db->prepare('DELETE FROM footertags WHERE footertag_id=:footertag_id');
    $kontrol = $sil->execute([
        'footertag_id' => $_GET['footertag_id'],
    ]);
    if ($kontrol) {
        header("Location:../admin_panel/production/footertags_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/footertags_ayar.php?durum=no");
    }
}