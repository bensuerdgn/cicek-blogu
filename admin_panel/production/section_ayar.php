<?php 
include 'header.php';
include '../../pdo/connect.php';

if (isset($_POST['arama'])) {
  $aranan=$_POST['aranan'];
  $sectionsor=$db->prepare("SELECT * FROM section WHERE section_baslik LIKE '%$aranan%' ORDER BY section_id DESC");
  $sectionsor->execute();
  $say=$sectionsor->rowCount();
}else {
  $sectionsor=$db->prepare("SELECT * FROM section ORDER BY section_id DESC");
  $sectionsor->execute();
  $say=$sectionsor->rowCount();
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
                        <h2>İçerik Ayarları   &nbsp  &nbsp
                                    
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
                        <a href="section_ekle.php"><button  class="btn btn-primary " ><i class="fa fa-plus" aria-hidden="true" ></i> Yeni Ekle</button></a>
                      </div>

                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                              <tr class="headings">
                                <th class="column-title text-center">İçerik Fotoğrafı </th>
                                <th class="column-title text-center">İçerik Başlığı </th>
                                <th class="column-title text-center">İçerik Açıklaması</th>
                                <th class="column-title text-center"> </th>
                                <th class="column-title text-center"> </th>
                                <th class="bulk-actions" colspan="7">
                                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                           
                            while ($sectioncek=$sectionsor->fetch(PDO::FETCH_ASSOC)) {
                            ?>            
                              <tr class="even pointer">
                                <td align="center" class=" "><img width="100" height="100" src="<?php echo $sectioncek['section_fotograf'] ?>" alt=""></td>
                                <td align="center" class=" "><?php echo $sectioncek['section_baslik'] ?></td>
                                <td align="center" class=" "><?php echo $sectioncek['section_aciklama'] ?></td>
                                <td align="center" class=" "><a href="section_duzenle.php?section_id=<?php echo $sectioncek['section_id']; ?>"><button style="width:80px;" class="btn btn-success btn-xs" ><i class="fa fa-pencil" aria-hidden="true" ></i> Düzenle</button></a></td>
                                <td align="center" class=" "><a href="../../pdo/sectionsil.php?sectionsil=ok&section_id=<?php echo $sectioncek['section_id']; ?>"><button style="width:80px;" class="btn btn-danger btn-xs" ><i class="fa fa-trash" aria-hidden="true" ></i> Sil</button></a></td>
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