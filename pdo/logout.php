<?php
session_start();
session_destroy();
header('Location:../admin_panel/production/login.php?durum=exit');
?>