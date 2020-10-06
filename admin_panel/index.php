<?php
ob_start();
session_start();
if (isset($_SESSION['kullanici_adi'])) {
    header('Location:production');
}else{
    header('Location:production/login.php');

}
 
?>