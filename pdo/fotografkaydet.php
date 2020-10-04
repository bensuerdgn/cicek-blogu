<?php
ob_start();
include 'connect.php';
if (isset($_POST['fotografkaydet'])) {

    $uploads_dir = '../img';
    @$tmp_name = $_FILES['kullanici_fotograf']['tmp_name'];
    @$name = $_FILES['kullanici_fotograf']['name'];
    $sayi = rand(20000, 32000);
    $imgyol = substr($uploads_dir, 6) . "/" . $sayi . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$sayi$name");

    $duzenle = $db->prepare("UPDATE admin_panel set
        kullanici_fotograf=:fotograf
        WHERE kullanici_id={$_POST['kullanici_id']}");
    $update = $duzenle->execute([
        'fotograf' => $imgyol,
    ]);
    if ($update) {
        $fotografsil = $_POST['eski_yol'];
        unlink("../../$fotografsil");
        header("Location:../admin_panel/production/profil_ayar.php?durum=ok");
    } else {
        header("Location:../admin_panel/production/profil_ayar.php?durum=no");
    }
}
