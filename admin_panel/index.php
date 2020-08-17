<?php
include "../connect.php";
$header = $db->query("SELECT * FROM header")->fetch(PDO::FETCH_ASSOC);
$nav = $db->query("SELECT * FROM nav");
$section = $db->query("SELECT * FROM section");
$footertitle = $db->query("SELECT * FROM footertitle")->fetch(PDO::FETCH_ASSOC);
$recentpost = $db->query("SELECT * FROM recentpost");
$latestpost = $db->query("SELECT * FROM latestpost");
$footertags = $db->query("SELECT * FROM footertags");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="./main.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src">çiçekçim</div>

            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Anasayfa</li>
                            <li>
                                <a href="index.html" class="mm-active">
                                    Ayarlar
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div>Analytics Dashboard
                                    <div class="page-title-subheading">This is an example dashboard created using
                                        build-in elements and components.
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <h3>Header Ayarları</h3>
                            <br>
                            <div class="position-relative row form-group"><label for="exampleEmail"
                                    class="col-sm-2 col-form-label"><h5>Blog Logo</h5></label>
                                <div class="col-sm-6"><input name="logo" 
                                        value="<?php echo $header['logo'] ?>" type="text" class="form-control"></div>
                            </div>
                            <div class="position-relative row form-group"><label for="exampleEmail"
                                    class="col-sm-2 col-form-label"><h5>Blog Anasayfa</h5></label>
                                <div class="col-sm-6"><input name="anasayfa" 
                                        value="<?php echo $header['anasayfa'] ?>" type="text" class="form-control"></div>
                            </div
                            ><div class="position-relative row form-group"><label for="exampleEmail"
                                    class="col-sm-2 col-form-label"><h5>Blog Galeri</h5></label>
                                <div class="col-sm-6"><input name="galeri" 
                                        value="<?php echo $header['galeri'] ?>" type="text" class="form-control"></div>
                            </div>
                            <br>
                            <h3>Nav Ayarları</h3>
                            <div class="position-relative row form-group"><label for="exampleEmail"
                                    class="col-sm-12 col-form-label"><h5>KATEGORİLER</h5></label>
                                    <?php
                                    if ($nav->rowCount()) {
                                        foreach($nav as $row){
                                    ?>
                                <div class="col-sm-6"> <input name="nav_tag" 
                                        value="<?php echo $row['nav_tag'] ?>" type="text" class="form-control"></div>
                                
                                    <?php
                                    }
                                        }
                                    ?>
                            </div>
                            <br>
                            <h3>Section Ayarları</h3>
                            <br>
                            <div class="position-relative row form-group"><label for="exampleEmail"
                                    class="col-sm-12 col-form-label"><h5>Blog Logo </h5></label>
                                
                                    <?php 
                                    if ($section->rowCount()) {
                                        foreach($section as $row){
                                    ?>
                                <div class="col-sm-6">SECTION FOTOĞRAF <input name="section_fotograf" 
                                        value="<?php echo $row['section_fotograf'] ?>" type="text" class="form-control"></div>
                                <div class="col-sm-6">SECTION BAŞLIK<input name="section_baslik" 
                                        value="<?php echo $row['section_baslik'] ?>" type="text" class="form-control"></div> 
                                <div class="col-sm-6">SECTION AÇIKLAMA<input name="section_aciklama" 
                                        value="<?php echo $row['section_aciklama'] ?>" type="text" class="form-control"></div>
                                    <?php 
                                        }
                                    }
                                    ?>
                            </div>
                            <br>
                            <h3>Footer Ayarları</h3>
                            <div class="position-relative row form-group"><label for="exampleEmail"
                                    class="col-sm-2 col-form-label"><h5>FOOTER LOGO</h5></label>
                                <div class="col-sm-6"><input name="footer_logo" 
                                        value="<?php echo $footertitle['footer_logo'] ?>" type="text" class="form-control"></div>
                            </div> 
                            <div class="position-relative row form-group"><label for="exampleEmail"
                                    class="col-sm-2 col-form-label"><h5>FOOTER AÇIKLAMA</h5></label>
                                <div class="col-sm-6"><input name="footer_aciklama" 
                                        value="<?php echo $footertitle['footer_aciklama'] ?>" type="text" class="form-control"></div>
                            </div>
                            <div class="position-relative row form-group"><label for="exampleEmail"
                                    class="col-sm-2 col-form-label"><h5>ÖNE ÇIKANLAR BAŞLIK</h5></label>
                                <div class="col-sm-6"><input name="one_cikan" 
                                        value="<?php echo $footertitle['one_cikan'] ?>" type="text" class="form-control"></div>
                            </div>
                            <div class="position-relative row form-group"><label for="exampleEmail"
                                    class="col-sm-12 col-form-label"><h5>ÖNE ÇIKANLAR</h5></label>
                                    <?php
                                    if ($recentpost->rowCount()) {
                                        foreach($recentpost as $row){
                                    ?>
                                <div class="col-sm-6">ÖNE ÇIKAN FOTOĞRAF<input name="recent_fotograf" 
                                        value="<?php echo $row['recent_fotograf'] ?>" type="text" class="form-control"></div>
                                <div class="col-sm-6">ÖNE ÇIKAN BAŞLIK<input name="recent_baslik" 
                                        value="<?php echo $row['recent_baslik'] ?>" type="text" class="form-control"></div>
                                <div class="col-sm-6">ÖNE ÇIKAN AÇIKLAMA<input name="recent_aciklama" 
                                        value="<?php echo $row['recent_aciklama'] ?>" type="text" class="form-control"></div>
                                    
                                    <?php
                                    }
                                        }
                                    ?>
                            </div>
                            <div class="position-relative row form-group"><label for="exampleEmail"
                                    class="col-sm-2 col-form-label"><h5>FOOTER BAŞLIK</h5></label>
                                <div class="col-sm-6"><input name="footer_baslik" 
                                        value="<?php echo $footertitle['footer_baslik'] ?>" type="text" class="form-control"></div>
                            </div>
                            <div class="position-relative row form-group"><label for="exampleEmail"
                                    class="col-sm-12 col-form-label"><h5>EKLENEN BAŞLIKLAR</h5></label>
                                    <?php
                                    if ($footertags->rowCount()) {
                                        foreach($footertags as $row){
                                    ?>
                                <div class="col-sm-6"> <input name="footer_tag" 
                                        value="<?php echo $row['footer_tag'] ?>" type="text" class="form-control"></div>
                                
                                    <?php
                                    }
                                        }
                                    ?>
                            </div>
                            <div class="position-relative row form-group"><label for="exampleEmail"
                                    class="col-sm-2 col-form-label"><h5>SON EKLENEN BAŞLIK</h5></label>
                                <div class="col-sm-6"><input name="son_cikan" 
                                        value="<?php echo $footertitle['son_post'] ?>" type="text" class="form-control"></div>
                            </div>
                            <div class="position-relative row form-group"><label for="exampleEmail"
                                    class="col-sm-12 col-form-label"><h5>SON EKLENENLER</h5></label>
                                    <?php
                                    if ($latestpost->rowCount()) {
                                        foreach($latestpost as $row){
                                    ?>
                                <div class="col-sm-6">SON EKLENEN FOTOĞRAF<input name="latest_fotograf" 
                                        value="<?php echo $row['latest_fotograf'] ?>" type="text" class="form-control"></div>
                                <div class="col-sm-6">SON EKLENEN BAŞLIK<input name="latest_baslik" 
                                        value="<?php echo $row['latest_baslik'] ?>" type="text" class="form-control"></div>
                                <div class="col-sm-6">SON EKLENEN AÇIKLAMA<input name="latest_aciklama" 
                                        value="<?php echo $row['latest_aciklama'] ?>" type="text" class="form-control"></div>
                                    
                                    <?php
                                    }
                                        }
                                    ?>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 1
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 2
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="app-footer-right">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 3
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <div class="badge badge-success mr-1 ml-0">
                                                <small>NEW</small>
                                            </div>
                                            Footer Link 4
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>

</html>