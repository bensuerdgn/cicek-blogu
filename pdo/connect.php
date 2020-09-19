<?php 
  try {
    $db = new PDO("mysql:host=localhost;dbname=blog_sayfam;charset=utf8", "root");
  } catch(PDOException $e) {
    print "Hata!: " . $e->getMessage() . "<br/>";
    die();
  }
?>
