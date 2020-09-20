<?php
include 'connect.php';
ob_start();
if (isset($_POST['latestpostduzenle'])) {
    $latestpost_id = $_POST['latestpost_id'];
    $duzenle = $db->prepare("UPDATE latestpost SET
        latest_fotograf=:fotograf,
        latest_baslik=:baslik,
        latest_aciklama=:aciklama,
        WHERE section_id=$latestpost_id");
    $update = $duzenle->execute([
        'fotograf' => $_POST['latest_fotograf'],
        'baslik' => $_POST['latest_baslik'],
        'aciklama' => $_POST['latest_aciklama'],
    ]);
    
    if ($update) {
        header("Location:../admin_panel/production/latestpost_duzenle?latestpost_id=$latestpost_id&durum=ok");
    } else {
        header("Location:../admin_panel/production/latestpost_duzenle?latestpost_id=$latestpost_id&durum=no");
    }

}
?>