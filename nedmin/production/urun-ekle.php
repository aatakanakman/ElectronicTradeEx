<?php include 'header.php';

$urunsor = $db -> prepare("SELECT * FROM urun where urun_id =:id");
$urunsor->execute(array(
  'id' => @$_GET['urun_id']
));
$uruncek=$urunsor -> fetch(PDO::FETCH_ASSOC);




?>



<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Ekleme <small>



              <?php 

              if (@$_GET['durum']== "ok") {?>


                <b style="color:green;"> İşlem Başarılı...</b>


              <?php } elseif (@$_GET['durum']=="no") {?>


                <b style="color:red;"> İşlem Başarısız...</b>


              <?php }

              ?>

            </small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- /en kök dizine çıkartır. .......  ../ bir üst dizine çık anlamında -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">


              <!-- Kategori seçme başlangıç ********************************-->


              <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

                  <?php  

                  $urun_id=$uruncek['kategori_id'] ?? 'default value'; 

                  $kategorisor=$db->prepare("select * from kategori where kategori_ust=:kategori_ust order by kategori_sira");
                  $kategorisor->execute(array(
                    'kategori_ust' => 0
                    ));

                    ?>
                    <select class="select2_multiple form-control" required="" name="kategori_id" >


                     <?php 

                     while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {

                       $kategori_id=$kategoricek['kategori_id'];

                       ?>

                       <option  value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>

                       <?php } ?>

                     </select>
                   </div>
                 </div>


                 <!-- kategori seçme bitiş -->

             

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Ürün Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_ad"  required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

               <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Detay <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <textarea class="ckeditor" id="editor1" name="urun_detay"> </textarea>
                        </div>
                      </div>

                      <script type="text/javascript">
                        
                        CKEDITOR.replace('editor1',

                        {

                          filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
                          filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
                          filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type= Flash',
                          filebrowserUploadUrl      : 'ckfinder/core/connector/php/connector.php?command?QuickUpload&type=Files',
                          filebrowserImageUploadUrl   'ckfinder/core/connector/php/connector.php?command?QuickUpload&type=Images',
                          filebrowserFlashUploadUrl   'ckfinder/core/connector/php/connector.php?command?QuickUpload&type=Flash',

                          forcePasteAsPlainText: true
                        }
                          );
                      </script>

                      <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Ürün Fiyat <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_fiyat"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Ürün Video <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_video"   class="form-control col-md-7 col-xs-12">
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Ürün Keyword <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_keyword"  required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Ürün Stok <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_stok"  required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="urun_durum" required>



                   <!-- Kısa İf Kulllanımı 

                    <?php echo $uruncek['urun_durum'] == '1' ? 'selected=""' : ''; ?>

                  -->

                  <option value="1">Aktif</option>



                  <option value="0">Pasif</option>
                  <!-- <?php 

                   if ($uruncek['urun_durum']==0) {?>


                   <option value="0">Pasif</option>
                   <option value="1">Aktif</option>


                   <?php } else {?>

                   <option value="1">Aktif</option>
                   <option value="0">Pasif</option>

                   <?php  }

                   ?> -->
                 </select>
               </div>
             </div>

             <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">


           </div>
           <div class="ln_solid"></div>
           <div class="form-group">
            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                  
              <button type="submit" name="urunekle" class="btn btn-success">Ekle</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<hr>
<hr>
<hr>

</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
