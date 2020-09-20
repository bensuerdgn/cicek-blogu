<?php 
include 'header.php';
include '../../pdo/connect.php';
?>
 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Anahtar Kelime Gir...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Ara!</button>
                    </span>
                  </div>
                </div>
            </div>
            <div class="x_content">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                        <h2>Kategori Ayarları
                        <small>
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
                                <th class="column-title text-center"> </th>
                                <th class="bulk-actions" colspan="7">
                                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            $navsor=$db->prepare("SELECT * FROM nav ORDER BY nav_id DESC");
                            $navsor->execute();
                            while ($navcek=$navsor->fetch(PDO::FETCH_ASSOC)) {
                            ?>            
                              <tr class="even pointer">
                                <td class=" "><?php echo $navcek['nav_tag'] ?></td>
                                <td class=" "><a href="nav_ekle.php"><button style="width:80px;" class="btn btn-success btn-xs" ><i class="fa fa-pencil" aria-hidden="true" ></i> Ekle</button></a></td>
                                <td class=" "><a href="../../pdo/navsil.php?navsil=ok&nav_id=<?php echo $navcek['nav_id']; ?>"><button style="width:80px;" class="btn btn-danger btn-xs" ><i class="fa fa-trash" aria-hidden="true" ></i> Sil</button></a></td>
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