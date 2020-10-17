<?php
include "../pdo/connect.php";

$ayarlar=$db->query("SELECT * FROM ayarlar")->fetch(PDO::FETCH_ASSOC);
$latestpost = $db->query("SELECT * FROM latestpost");
$recentpost = $db->query("SELECT * FROM recentpost");
$footertags = $db->query("SELECT * FROM footertags");

if (isset($_GET['tag'])) {
    $section_query = $db->prepare("SELECT * FROM section WHERE section_baslik=?");
    $section_query->execute([
        $_GET['tag'],
    ]);
    $section=$section_query->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="<?php echo $ayarlar['ayar_author'] ?>">
    <meta name="description" content="<?php echo $ayarlar['ayar_description'] ?>">
    <meta name="keywords" content="<?php echo $ayarlar['ayar_keywords'] ?>">
    <link rel="stylesheet" href="blog.css">
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
            <div class="content">
                <div class="content-box">
                    <div class="img"><img src="<?php echo $section["section_fotograf"]; ?>"
                            alt="turuncu çiçek"></div>
                    <div class="box-info">
                        <div class="box-title">
                                <h2><?php echo $section["section_baslik"]; ?></h2>
                            </div>
                        <div class="box-text">
                            <p><?php echo $section["section_aciklama"]; ?></p>
                        </div>
                    </div>
                </div>
                <div class="blog-latest-posts">
                    <h2>Son Postlar</h2>
                    <?php
                        if ($latestpost->rowCount()) {
                            foreach($latestpost as $row){
                    ?>
                    <div class="latest-posts">
                        <div class="latest-posts-img">
                            <a href=" index?sayfa=latestpost_detay&latestpost_id=<?php echo $row['latestpost_id']; ?>"> <img src="<?php echo $row["latest_fotograf"]; ?>"></a>
                        </div>
                        <div class="latest-post-title">
                            <p><?php echo $row["latest_baslik"]; ?></p>
                            <p><?php echo $row["latest_aciklama"]; ?></p>
                        </div>
                    </div>
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
                            <a href="index?sayfa=recentpost_detay&recentpost_id=<?php echo $row['recentpost_id']; ?>"> <img src="<?php echo $row["recent_fotograf"]; ?>"></a>
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
                        <a href="index?sayfa=tag_detay&tag=<?php echo $row["footer_tag"] ?>"><?php echo $row["footer_tag"] ?></a>
                    <?php 
                        }
                            }
                    ?>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
