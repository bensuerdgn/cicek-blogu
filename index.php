
<?php
include "./connect.php";
$header = $db->query("SELECT * FROM header")->fetch(PDO::FETCH_ASSOC);
$nav = $db->query("SELECT * FROM nav");
$section = $db->query("SELECT * FROM section");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <script src="https://kit.fontawesome.com/8bbf8c5eb9.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-background">
                <div class="blog-text">
                    <div class="blog-title">
                        <h1><?php echo $header["logo"]; ?></h1>
                    </div>
                    <div class="blog-choice">
                        <a href="#"><?php echo $header["anasayfa"]; ?></a>
                        <a href="#"><?php echo $header["galeri"]; ?></a>
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
                        <a href="#"><?php echo $row["kategori"]; ?></a>
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
                            <img src="<?php echo $row["fotograf"]; ?>"
                                alt="turuncu çiçek">
                        </div>
                        <div class="box-info">
                            <div class="box-title">
                                <a href="">
                                    <h2><?php echo $row["baslik"]; ?></h2>
                                </a>
                            </div>
                            <div class="box-text">
                                <p><?php echo $row["aciklama"]; ?></p>
                            </div>
                        </div>
                                
                    </div>
                    <?php }
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
                    <h1>ÇİÇEKLER</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ad saepe accusamus nostrum
                        aut eius eligendi impedit voluptas quaerat molestias, labore qui id quod temporibus tempora.
                        Ducimus alias ipsam dolore?</p>
                </div>
                <div class="footer-recent-posts">
                    <h2>Öne Çıkanlar</h2>
                    <div class="recent-posts">
                        <div class="recent-posts-img">
                            <a href="#"> <img src="https://cdn.pixabay.com/photo/2015/04/08/15/09/daisy-712892__340.jpg"
                                    alt="papatya"></a>
                        </div>
                        <div class="recent-post-title">
                            <p>PAPATYA</p>
                            <p>papatyalar en güzel çiçeklerdir</p>
                        </div>
                    </div>
                    <div class="recent-posts">
                        <div class="recent-posts-img">
                            <a href="#"> <img src="https://cdn.pixabay.com/photo/2015/04/08/15/09/daisy-712892__340.jpg"
                                    alt="papatya"></a>
                        </div>
                        <div class="recent-post-title">
                            <p>PAPATYA</p>
                            <p>papatyalar en güzel çiçeklerdir</p>
                        </div>
                    </div>
                    <div class="recent-posts">
                        <div class="recent-posts-img">
                            <a href="#"> <img src="https://cdn.pixabay.com/photo/2015/04/08/15/09/daisy-712892__340.jpg"
                                    alt="papatya"></a>
                        </div>
                        <div class="recent-post-title">
                            <p>PAPATYA</p>
                            <p>papatyalar en güzel çiçeklerdir</p>
                        </div>
                    </div>
                </div>
                <div class="footer-tags">
                    <h2>Başlıklar</h2>
                    <div class="tag-cloud">
                        <a href="#">papatya</a>
                        <a href="#">aloe vera</a>
                        <a href="#">kaktüs</a>
                        <a href="#">lale</a>
                        <a href="#">gül</a>
                        <a href="#">papatya</a>
                        <a href="#">aloe vera</a>
                        <a href="#">kaktüs</a>
                        <a href="#">lale</a>
                        <a href="#">gül</a>
                        <a href="#">papatya</a>
                        <a href="#">aloe vera</a>
                        <a href="#">kaktüs</a>
                        <a href="#">lale</a>
                        <a href="#">gül</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="script.js"></script>
</body>

</html>