<?php 
include 'header.php';
include '../../pdo/connect.php';

if (isset($_POST['arama'])) {
  $aranan=$_POST['aranan'];
  $footertagsor=$db->prepare("SELECT * FROM footertags WHERE footer_tag LIKE '%$aranan%' ORDER BY footertag_id DESC");
  $footertagsor->execute();
  $say=$footertagsor->rowCount();
}else {
  $footertagsor=$db->prepare("SELECT * FROM footertags ORDER BY footertag_id DESC");
  $footertagsor->execute();
  $say=$footertagsor->rowCount();
}
?>
 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <form action="" method="post">
                      <div class="input-group">
                        <input type="text" class="form-control" name="aranan" placeholder="Anahtar Kelime Giriniz...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" name="arama" type="submit">Ara!</button>
                        </span>
                      </div>
                    </form>
                </div>
            </div>
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                        <h2>Kategori Ayarları  &nbsp  &nbsp
                          <?php if(isset($_POST['aranan'])){ echo $_POST['aranan']; }?>

                        <small>
                        <?php echo $say." kayıt bulundu" ?>

                              <?php
                                if(isset($_GET['durum'])){
                                 if ($_GET['durum'] == 'ok') {
                              ?>
                              <b style="color:green">İşlem Başarılı</b>
                              <?php
                                } elseif ($_GET['durum'] == 'no') {
                              ?>
                              <b style="color:red">İşlem Başarılı Değil</b>
                              <?php
                                }
                               }
                              ?>
                          </small>
                        </h2>
                      <div align="right" >
                      <a href="footertag_ekle.php"><button  class="btn btn-primary " ><i class="fa fa-plus" aria-hidden="true" ></i> Yeni Ekle</button></a>

                      </div>

                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                              <tr class="headings">
                                <th class="column-title text-center">Kategori Adı </th>
                                <th class="column-title text-center"> </th>
                                <th class="bulk-actions" colspan="7">
                                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            while ($footertagcek=$footertagsor->fetch(PDO::FETCH_ASSOC)) {
                            ?>            
                              <tr class="even pointer">
                                <td align="center" class=" "><?php echo $footertagcek['footer_tag'] ?></td>
                                <td class=" "><a href="../../pdo/footertagsil.php?footertagsil=ok&footertag_id=<?php echo $footertagcek['footertag_id']; ?>"><button style="width:80px;" class="btn btn-danger btn-xs" ><i class="fa fa-trash" aria-hidden="true" ></i> Sil</button></a></td>
                              </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                      </div>
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