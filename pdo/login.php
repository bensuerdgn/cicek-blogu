<?php
include 'connect.php';
ob_start();
session_start();

if (isset($_POST['login'])) {

    $kullanici_ad = $_POST['kullanici_ad'];
    $kullanici_sifre = md5($_POST['kullanici_sifre']);
    if ($kullanici_ad && $kullanici_sifre) {
        $sorgu = $db->prepare('SELECT * FROM admin_panel WHERE kullanici_ad=:ad AND kullanici_sifre=:sifre ');
        $sorgu->execute([
            'ad' => $kullanici_ad,
            'sifre' => $kullanici_sifre,
        ]);
        $say = $sorgu->rowCount();
        echo $say;
        if ($say > 0) {
            $_SESSION['kullanici_ad'] = $kullanici_ad;
            header('Location:../admin_panel/production/index.php');
        }else {
            header('Location:../admin_panel/production/login.php?durum=no');
        }
    }
}
