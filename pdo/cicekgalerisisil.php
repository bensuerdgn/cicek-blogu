<?php
include 'connect.php';
ob_start();
if ($_GET['cicekgalerisisil'] == 'ok') {
    $sil = $db->prepare('DELETE FROM cicek_galerisi WHERE cicekgalerisi_id=:cicekgalerisi_id');
    $kontrol = $sil->execute([
        'cicekgalerisi_id' => $_GET['cicekgalerisi_id'],
    ]);
    if ($kontrol) {
        header("Location:../admin_panel/production/cicekgalerisi_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/cicekgalerisi_ayar.php?durum=no");
    }
}