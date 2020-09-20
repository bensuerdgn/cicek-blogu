<?php
include 'connect.php';
ob_start();
if (isset($_POST['cicekgalerisiekle'])) {
    $ekle = $db->prepare("INSERT INTO cicek_galerisi SET
        cicekgalerisi_fotograf=:fotograf");
    $insert = $ekle->execute([
        'fotograf' => $_POST['cicekgalerisi_fotograf'],
    ]);
    if ($insert) {
        header("Location:../admin_panel/production/cicekgalerisi_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/cicekgalerisi_ayar.php?durum=no");
    }
}
