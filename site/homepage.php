
<?php
include "../pdo/connect.php";
$ayarlar=$db->query("SELECT * FROM ayarlar")->fetch(PDO::FETCH_ASSOC);
$nav = $db->query("SELECT * FROM nav");
$section = $db->query("SELECT * FROM section");
$recentpost = $db->query("SELECT * FROM recentpost");
$footertags = $db->query("SELECT * FROM footertags");

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

    <link rel="stylesheet" href="main.css">

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
                        <a href="#">Anasayfa</a>
                        <a href="#">Çiçek Galerisi</a>
                    </div>

                </div>
            </div>
        </div>
        <nav>
            <div class="nav">
                <div class="nav-tag">
                    <?php
                        if ($nav->rowCount()) {
                           foreach ($nav as $row) {
                    ?>
                        <a href="#"><?php echo $row["nav_tag"]; ?></a>
                    <?php
                        }
                            }
                    ?>
                </div>
            </div>
        </nav>
        <section>
            <div class="section">
                <div class="content">
                        <?php 
                            if ($section->rowCount()) {
                                foreach($section as $row){
                        ?>
                    <div class="content-box">
                        
                        <div class="img">
                            <img src="<?php echo $row["section_fotograf"]; ?>">
                        </div>
                        <div class="box-info">
                            <div class="box-title">
                                <a href="index.php?sayfa=blog&section_id=<?php echo $row['section_id']; ?>">
                                    <h2><?php echo $row["section_baslik"]; ?></h2>
                                </a>
                            </div>
                            <div class="box-text">
                                <p><?php echo $row["section_aciklama"]; ?></p>
                            </div>
                        </div>
                                
                    </div>
                    <?php 
                        }
                            }
                    ?>
                </div>
            </div>  
            <div class="page-number">
                <div class="number">
                    <a href="#">1</a>
                    <a href="#">2</a>
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
                            <a href="index.php?sayfa=blog&recentpost_id=<?php echo $row['recentpost_id']; ?>"> <img src="<?php echo $row["recent_fotograf"]; ?>"></a>
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
                        <a href="index.php?sayfa=blog&kategori=<?php echo $row['footer_tag']; ?>"><?php echo $row["footer_tag"] ?></a>
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