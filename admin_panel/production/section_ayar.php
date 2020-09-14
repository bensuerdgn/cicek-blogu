<?php include 'header.php';?>

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
                        <h2>İçerik Ayarları <small>jhfdbchx</small></h2>
                      <div align="right" >
                        <a href="section-ekle.php"><button  class="btn btn-primary " ><i class="fa fa-plus" aria-hidden="true" ></i> Yeni Ekle</button></a>
                      </div>
                          
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                              <tr class="headings">
                                <th class="column-title">Id </th>
                                <th class="column-title">İçerik Fotoğraf </th>
                                <th class="column-title">İçerik Başlık </th>
                                <th class="column-title">İçerik Açıklama</th>
                                <th class="column-title"> </th>
                                <th class="column-title"> </th>
                                <th class="bulk-actions" colspan="7">
                                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="even pointer">
                                <td class=" "></td>
                                <td class=" "></td>
                                <td class=" "></td>
                                <td class=" "></td>
                                <td class=" "><button style="width:80px;" class="btn btn-success btn-xs" ><i class="fa fa-pencil" aria-hidden="true" ></i> Düzenle</button></td>
                                <td class=" "><button style="width:80px;" class="btn btn-danger btn-xs" ><i class="fa fa-trash" aria-hidden="true" ></i> Sil</button></td>
                              </tr>
                             
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