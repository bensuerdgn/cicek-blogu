<?php 

include '../../site/connect.php';
include 'header.php';
$ayarlar=$db->query("SELECT * FROM ayarlar")->fetch(PDO::FETCH_ASSOC);

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
                                    <h2>İçerik Ayarları 
                                        <small>
                                        <?php
                                        if ($_GET['durum']=='ok') {
                                        ?>
                                            <b style="color:green">Başarıyla Güncellendi</b>
                                        <?php
                                        } elseif ($_GET['durum']=='no') {
                                        ?>
                                            <b style="color:red">Başarıyla Güncellenemedi</b>
                                        <?php    
                                        }
                                        ?>
                                        </small>
                                    </h2>
                                   
                                     <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="../../site/islem.php" method="POST" class="form-horizontal form-label-left input_mask">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik Fotoğrafı <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="ayar_title" required="required" placeholder="içerik fotoğrafı ekleyiniz..." class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik Başlığı  <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="ayar_description" required="required" placeholder="içerik başlığı ekleyiniz..." class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İçerik Açıklaması <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="ayar_keywords" required="required" placeholder="içerik açıklaması ekleyiniz" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" name="genelayarkaydet" class="btn btn-primary">Ekle</button>
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