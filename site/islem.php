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
        WHERE ayar_id=1");
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

if ($_GET['iceriksil'] == 'ok') {
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
if (isset($_POST['sectionduzenle'])) {
    $duzenle = $db->prepare("UPDATE section SET
        section_fotograf=:fotograf,
        section_baslik=:baslik,
        section_aciklama=:aciklama,
        WHERE section_id={$_POST['section_id']}
");
    $update2 = $duzenle->execute([
        'fotograf' => $_POST['section_fotograf'],
        'baslik' => $_POST['section_baslik'],
        'aciklama' => $_POST['section_aciklama'],
    ]);
    $section_id=$_POST['section_id'];
    if ($update2) {
        header("Location:../admin_panel/production/section_duzenle.php?section_id=$section_id&durum=ok");
    } else {
        header("Location:../admin_panel/production/section_duzenle.php?section_id=$section_id&durum=no");

    }
} 