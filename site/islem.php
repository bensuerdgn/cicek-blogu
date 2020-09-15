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
    } else {
        header("Location:../admin_panel/production/genel_ayar.php?durum=no");

    }
} else {
    echo "noooo";
}

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
} else {
    echo "noooo";
}
