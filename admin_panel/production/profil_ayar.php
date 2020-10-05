<?php 

include '../../pdo/connect.php';
include 'header.php';

?>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Ayarlar</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Anahtar kelimeniz..">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Ara</button>
                                </span>
                            </div>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Profil Ayarları
                                        <small>
                                        <?php
                                        if(isset($_GET['durum'])){
                                          if ($_GET['durum']=='ok') {
                                        ?>
                                            <b style="color:green">Başarıyla Güncellendi</b>
                                        <?php
                                       } elseif ($_GET['durum']=='no') {
                                        ?>
                                            <b style="color:red">Başarıyla Güncellenemedi</b>
                                        <?php    
                                        }}
                                        ?>
                                        </small>
                                    </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                     <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="../../pdo/fotografkaydet.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left input_mask">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Profil Fotoğrafınız <span class="required"></span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">                                                <?php
                                                    if (strlen($profil_ayar['kullanici_fotograf'])>0) {?>
                                                        <img width="100px" src="../<?php echo $profil_ayar['kullanici_fotograf'] ?>" alt="profil fotografı">
                                                        <?php
                                                    } else {?>
                                                        <img width="100px" src="https://fastly.4sqi.net/img/user/130x130/86680468_tpemgjOn_bpbEG15uJOrLiylGK6pa-8bBWbzC6zxNPnIdAEnm2PjqnnxswQP-xA68Q33cVj43" alt="profil fotografı">
                                                        <?php
                                                    }
                                                    
                                                    ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adınız Soyadınız  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="file" name="kullanici_fotograf" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <input type="hidden" name="eski_yol" value="<?php echo $profil_ayar['kullanici_fotograf'] ?>">
                                        <input type="hidden" name="kullanici_id" value="<?php echo $profil_ayar['kullanici_id'] ?>">
                                        <div class="form-group" >
                                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" name="fotografkaydet" class="btn btn-primary">Güncelle</button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <form action="../../pdo/profilayarkaydet.php" method="post" class="form-horizontal form-label-left input_mask">
                                        <input type="hidden" name="kullanici_id" value="<?php echo $profil_ayar['kullanici_id'] ?>">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Ad Soyad  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="kullanici_adsoyad" required="required" value="<?php echo $profil_ayar['kullanici_adsoyad']; ?>" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adınız  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="kullanici_ad" required="required" disabled value="<?php echo $profil_ayar['kullanici_ad']; ?>" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Şifreniz <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="password" name="kullanici_sifre" required="required" value="<?php echo $profil_ayar['kullanici_sifre']; ?>" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" name="profilayarkaydet" class="btn btn-primary">Güncelle</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- /page content -->

        <!-- footer content -->
       <?php include 'footer.php';?>