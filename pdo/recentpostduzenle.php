<?php
include 'connect.php';
ob_start();
if (isset($_POST['recentpostduzenle'])) {
    $recentpost_id = $_POST['recentpost_id'];
    $duzenle = $db->prepare("UPDATE recentpost SET
        recent_fotograf=:fotograf,
        recent_baslik=:baslik,
        recent_aciklama=:aciklama,
        WHERE section_id=$recentpost_id");
    $update = $duzenle->execute([
        'fotograf' => $_POST['recent_fotograf'],
        'baslik' => $_POST['recent_baslik'],
        'aciklama' => $_POST['recent_aciklama'],
    ]);
    
    if ($update) {
        header("Location:../admin_panel/production/recentpost_duzenle?recentpost_id=$recentpost_id&durum=ok");
    } else {
        header("Location:../admin_panel/production/recentpost_duzenle?recentpost_id=$recentpost_id&durum=no");
    }

}
?>