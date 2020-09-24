<?php 
include 'header.php';

include '../../pdo/connect.php';  
$recentpostsor = $db->prepare('SELECT * FROM recentpost WHERE recentpost_id=:recentpost_id');
$recentpostsor->execute([
        'recentpost_id' => $_GET['recentpost_id']
    ]);
$recentpostcek=$recentpostsor->fetch(PDO::FETCH_ASSOC);
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
                                    <h2>Son Başlık Ayarları 
                                    <?php
                                        if(isset($_GET['durum'])){
                                          if ($_GET['durum']=='ok') {
                                        ?>
                                            <b style="color:green">Güncelleme Başarılı</b>
                                        <?php
                                       } elseif ($_GET['durum']=='no') {
                                        ?>
                                            <b style="color:red">Güncelleme Başarılı Değil</b>
                                        <?php    
                                        }}
                                        ?>
                                        </small>
                                    </h2>
                                    <div align="right" >
                                        <a href="recentpost_ayar.php">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-undo" aria-hidden="true">  Geri Dön</i>
                                            </button>
                                        </a>
                                    </div>
                                     <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="../../pdo/recentpostduzenle.php" method="POST" class="form-horizontal form-label-left input_mask">
                                    <input type="hidden" name="recentpost_id" value="<?php echo $recentpostcek['recentpost_id'] ?>">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Öne Çıkan Fotoğraf <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="recent_fotograf" required="required" value="<?php echo $recentpostcek['recent_fotograf']; ?>" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Öne Çıkan Başlık  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="recent_baslik" required="required" value="<?php echo $recentpostcek['recent_baslik']; ?>" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Öne Çıkan Açıklama <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="recent_aciklama" required="required" value="<?php echo $recentpostcek['recent_aciklama']; ?>" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" name="recentpostduzenle" class="btn btn-primary">Düzenle</button>
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