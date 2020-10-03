<?php
ob_start();
include 'connect.php';
if (isset($_POST['profilayarkaydet'])) {
    $profilayarkaydet = $db->prepare("UPDATE admin_panel set
        kullanici_ad=:ad,
        kullanici_sifre=:sifre
        WHERE kullanici_id=1");
    $update = $profilayarkaydet->execute([
        'ad' => $_POST['kullanici_ad'],
        'sifre' => $_POST['kullanici_sifre'],
    ]);
    if ($update) {
        header("Location:../admin_panel/production/profil_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/profil_ayar.php?durum=no");
    }
}
