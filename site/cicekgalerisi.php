
<?php
include "../pdo/connect.php";
include "function.php";
$ayarlar_query=$db->prepare("SELECT * FROM ayarlar");
$ayarlar_query->execute();
$ayarlar=$ayarlar_query->fetch(PDO::FETCH_ASSOC);

$latestpost = $db->prepare("SELECT * FROM latestpost");
$latestpost->execute();

$recentpost = $db->prepare("SELECT * FROM recentpost");
$recentpost->execute();

$footertags = $db->prepare("SELECT * FROM footertags");
$footertags->execute();

$nav = $db->prepare("SELECT * FROM nav");
$nav->execute();

$section = $db->prepare("SELECT * FROM section");
$section->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="<?php echo $ayarlar['ayar_author'] ?>">
    <meta name="description" content="<?php echo $ayarlar['ayar_description'] ?>">
    <meta name="keywords" content="<?php echo $ayarlar['ayar_keywords'] ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="cicekgalerisi.css">

    <script src="https://kit.fontawesome.com/8bbf8c5eb9.js" crossorigin="anonymous"></script>

    <title><?php echo $ayarlar['ayar_title'] ?></title>
</head>

<body>
    <div class="container">
    <div class="header">
            <div class="header-background">
                <div class="blog-text">
                    <div class="blog-title">
                        <h1><?php echo $ayarlar['site_logo'] ?></h1>
                    </div>
                    <div class="blog-choice">
                        <a href="homepage">ANASAYFA</a>
                        <a href="cicekgalerisi">ÇİÇEK GALERİSİ</a>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="section">
                <div class="content">
                        <?php 

                    $sayfada=10;

                    $sorgu=$db->prepare("SELECT * FROM cicek_galerisi");
                    $sorgu->execute();
                    $toplam_icerik=$sorgu->rowCount();
                    $toplam_sayfa=ceil($toplam_icerik/$sayfada);

                    $sayfa=isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

                    if ($sayfa<1) $sayfa=1;
                    if ($sayfa>$toplam_sayfa) $sayfa=$toplam_sayfa;

                    $limit = ($sayfa - 1) * $sayfada;
                    $ciceksor=$db->prepare("SELECT * FROM cicek_galerisi ORDER BY cicekgalerisi_id DESC LIMIT $limit, $sayfada");
                    $ciceksor->execute();
                    $say=$ciceksor->rowCount();


                    while ($cicekcek=$ciceksor->fetch(PDO::FETCH_ASSOC)) {

                        ?>
                    <div class="content-box">
                        
                        <div class="img">
                            <img src="<?php echo $cicekcek["cicekgalerisi_fotograf"]; ?>">
                        </div>  
                    </div>
                    <?php 
                        }
                            
                    ?>
                </div>
            </div>  
            <div class="page-number">
                <div class="number">
            <?php
            $s=0;
            while ($s < $toplam_sayfa) {
                $s++;
                if ($s==$sayfa) {
            ?>
                        <a href="cicekgalerisi?sayfa=<?php echo $s ; ?>"><?php echo $s ; ?></a>
                    
                    <?php
                }else {
                    ?>
                        <a href="cicekgalerisi?sayfa=<?php echo $s ; ?>"><?php echo $s ; ?></a>
                    
            <?php
                }
            }
            ?>
               </div> 
            </div>
        </section>
        <footer>
            <div class="footer">
                <div class="footer-title">
                    <h1>
                    <?php
                     echo $ayarlar["site_logo"]; 
                    ?>
                     </h1>
                    <p><?php echo $ayarlar["site_aciklama"]; ?></p>
                </div>
                <div class="footer-recent-posts">
                    <h2>Öne Çıkanlar</h2>
                    <?php
                        if ($recentpost->rowCount()) {
                            foreach($recentpost as $row){
                    ?>
                    <div class="recent-posts">
                        <div class="recent-posts-img">
                            <a href="recentpost/<?=seo($row['recent_baslik']).'/'.$row['recentpost_id'];?>"> <img src="<?php echo $row["recent_fotograf"]; ?>"></a>
                        </div>
                        <div class="recent-post-title">
                            <p><?php echo $row["recent_baslik"]; ?></p>
                            <p><?php echo $row["recent_aciklama"]; ?></p>
                        </div>
                    </div>
                    <?php 
                        }
                            }
                    ?>

                </div>
                <div class="footer-tags">
                    <h2>Başlıklar</h2>
                   
                    <div class="tag-cloud">
                    <?php 
                        if ($footertags->rowCount()) {
                            foreach($footertags as $row){
                    ?>
                        <a href="tag/<?=seo($row['footer_tag']);?>"><?php echo $row["footer_tag"] ?></a>
                    <?php 
                        }
                            }
                    ?>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="script.js"></script>
</body>

</html>