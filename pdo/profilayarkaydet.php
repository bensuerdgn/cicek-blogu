<?php
ob_start();
include 'connect.php';
if (isset($_POST['profilayarkaydet'])) {
    $kullanici_sifre = md5($_POST['kullanici_sifre']);
    $kullanici_id=$_POST['kullanici_id'];

    $profilayarkaydet = $db->prepare("UPDATE admin_panel set
        kullanici_adsoyad=:adsoyad,
        kullanici_sifre=:sifre
        WHERE kullanici_id=$kullanici_id");
    $update = $profilayarkaydet->execute([
        'adsoyad' => $_POST['kullanici_adsoyad'],
        'sifre' => $kullanici_sifre,
    ]);
    if ($update) {
        header("Location:../admin_panel/production/profil_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/profil_ayar.php?durum=no");
    }
}
