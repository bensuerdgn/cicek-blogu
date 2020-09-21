<?php
include 'connect.php';
ob_start();
if (isset($_POST['sectionduzenle'])) {
    $section_id = $_POST['section_id'];
    $duzenle = $db->prepare("UPDATE section SET
        section_fotograf=:fotograf,
        section_baslik=:baslik,
        section_aciklama=:aciklama
        WHERE section_id=$section_id");
    $update = $duzenle->execute([
        'fotograf' => $_POST['section_fotograf'],
        'baslik' => $_POST['section_baslik'],
        'aciklama' => $_POST['section_aciklama'],
    ]);
    
    if ($update) {
        header("Location:../admin_panel/production/section_duzenle.php?section_id=$section_id&durum=ok");
    } else {
        header("Location:../admin_panel/production/section_duzenle.php?section_id=$section_id&durum=no");
    }

}
?>