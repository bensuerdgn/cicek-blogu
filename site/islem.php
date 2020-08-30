<?php
ob_start();
include 'connect.php';
if (isset($_POST['genelayarkaydet'])) {
    $genelayarkaydet = $db->prepare("UPDATE ayarlar set
        ayar_title=:title,
        ayar_description=:descript,
        ayar_keywords=:keywords,
        ayar_author=:author,
        site_logo=:logo,
        site_aciklama=:aciklama
        WHERE id=1");
    $update = $genelayarkaydet->execute([
        'title' => $_POST['ayar_title'],
        'descript' => $_POST['ayar_description'],
        'keywords' => $_POST['ayar_keywords'],
        'author' => $_POST['ayar_author'],
        'logo' => $_POST['site_logo'],
        'aciklama' => $_POST['site_aciklama'],
    ]);
    if ($update) {
        header("Location:../admin_panel/production/genel_ayar.php?durum=ok");
    }else{
        header("Location:../admin_panel/production/genel_ayar.php?durum=no");

    }
} else {
    echo "noooo";
}
