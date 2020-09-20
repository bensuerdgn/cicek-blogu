<?php 
include 'header.php';

include '../../pdo/connect.php';  
$latestpostsor = $db->prepare('SELECT * FROM latestpost WHERE latestpost_id=:latestpost_id');
$latestpostsor->execute([
        'latestpost_id' => $_GET['latestpost_id']
    ]);
$latestpostcek=$latestpostsor->fetch(PDO::FETCH_ASSOC);
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
                                   
                                     <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="../../pdo/latestpostduzenle.php" method="POST" class="form-horizontal form-label-left input_mask">
                                    <input type="hidden" name="latestpost_id" value="<?php echo $latestpostcek['latestpost_id'] ?>">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Son Başlık Fotoğrafı <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="latest_fotograf" required="required" value="<?php echo $latestpostcek['latest_fotograf']; ?>" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Son Başlık Başlığı  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="latest_baslik" required="required" value="<?php echo $latestpostcek['latest_baslik']; ?>" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Son Başlık Açıklaması <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="latest_aciklama" required="required" value="<?php echo $latestpostcek['latest_aciklama']; ?>" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" name="latestpostduzenle" class="btn btn-primary">Düzenle</button>
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