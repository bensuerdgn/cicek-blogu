<?php
include "./connect.php";
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location:index.php');
    exit;
}
$header = $db->query("SELECT * FROM header")->fetch(PDO::FETCH_ASSOC);

$section_query = $db->prepare("SELECT * FROM section WHERE id=?");
$section_query->execute([
    $_GET['id'],
]);
$section=$section_query->fetch(PDO::FETCH_ASSOC);

$footertitle = $db->query("SELECT * FROM footertitle")->fetch(PDO::FETCH_ASSOC);
$footerlatestpost = $db->query("SELECT * FROM footerlatestpost");
$footerrecentpost = $db->query("SELECT * FROM footerrecentpost");
$footertags = $db->query("SELECT * FROM footertags");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="blog.css">
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
        <section>
            <div class="content">
                <div class="content-box">
                    <div class="img"><img src="<?php echo $section["fotograf"]; ?>"
                            alt="turuncu çiçek"></div>
                    <div class="box-info">
                        <div class="box-title"><a href="index.php?sayfa=blog&id=<?php echo $row['id']; ?>">
                                <h2><?php echo $section["baslik"]; ?></h2>
                            </a></div>
                        <div class="box-text">
                            <p><?php echo $section["aciklama"]; ?></p>
                        </div>
                    </div>
                </div>
                <div class="blog-latest-posts">
                    <h2><?php echo $footertitle["son-post"]; ?></h2>
                    <?php
                        if ($footerlatestpost->rowCount()) {
                            foreach($footerlatestpost as $row){
                    ?>
                    <div class="latest-posts">
                        <div class="latest-posts-img">
                            <a href=" index.php?sayfa=blog&id=<?php echo $row['id']; ?>"> <img src="<?php echo $row["fotograf"]; ?>"></a>
                        </div>
                        <div class="latest-post-title">
                            <p><?php echo $row["fotograf-isim"]; ?></p>
                            <p><?php echo $row["fotograf-aciklama"]; ?></p>
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
                     echo $footertitle["logo"]; 
                    ?>
                     </h1>
                    <p><?php echo $footertitle["aciklama"]; ?></p>
                </div>
                <div class="footer-recent-posts">
                    <h2><?php echo $footertitle["one-cikan"]; ?></h2>
                    <?php
                        if ($footerrecentpost->rowCount()) {
                            foreach($footerrecentpost as $row){
                    ?>
                    <div class="recent-posts">
                        <div class="recent-posts-img">
                            <a href="index.php?sayfa=blog&id=<?php echo $row['id']; ?>"> <img src="<?php echo $row["fotograf"]; ?>"></a>
                        </div>
                        <div class="recent-post-title">
                            <p><?php echo $row["fotograf-isim"]; ?></p>
                            <p><?php echo $row["fotograf-aciklama"]; ?></p>
                        </div>
                    </div>
                    <?php 
                        }
                            }
                    ?>

                </div>
                <div class="footer-tags">
                    <h2><?php echo $footertitle["baslik"] ?></h2>
                   
                    <div class="tag-cloud">
                    <?php 
                        if ($footertags->rowCount()) {
                            foreach($footertags as $row){
                    ?>
                        <a href="#"><?php echo $row["kategori"] ?></a>
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
