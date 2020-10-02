<?php include 'header.php'; 
// Belirli bir veriyi seçme işlemi.
$urunsor = $db -> prepare("SELECT * FROM urun order by urun_id DESC");
$urunsor->execute();




?>



<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Listeleme<small>

              <?php 

              if (@$_GET['durum']== "ok") {?>


                <b style="color:green;"> İşlem Başarılı...</b>


              <?php } elseif (@$_GET['durum']=="no") {?>


                <b style="color:red;"> İşlem Başarısız...</b>


              <?php }

              ?>



              <?php 

              if (@$_GET['sil']== "ok") {?>


                <b style="color:green;"> İşlem Başarılı...</b>


              <?php } elseif (@$_GET['sil']=="no") {?>


                <b style="color:red;"> İşlem Başarısız...</b>


              <?php }

              ?>

            </small></h2>
            <div class="clearfix"></div>

            <div align="right">
              <a href="urun-ekle.php"><button class="btn btn-success btn-xs">Yeni Ekle</button></a>
            </div>

            
          </div>
          <div class="x_content">


           <!-- Div içeriğinin başlangıcı -->

           <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th >Sıra No</th>
                <th >Ürün Ad</th>
                <th >Ürün Stok</th>
                <th  >Ürün Fiyat</th>
                
                <th width="20">Ürün Durum</th>
                <th width="15"></th>
                <th width="15"></th>
              </tr>
            </thead>

            <tbody>

              <?php 

              $say = 0;

              while ($uruncek=$urunsor -> fetch(PDO::FETCH_ASSOC)) { $say++ ?>

                <tr>
                  <td ><?php echo $say; ?></td>
                  <td ><?php echo $uruncek['urun_ad']; ?></td>
                  <td ><?php echo $uruncek['urun_stok']; ?></td>
                  <td ><?php echo $uruncek['urun_fiyat']; ?></td>
                  


                  <td> 

                  <?php 

                  if ($uruncek['urun_durum']==1) {?>

                   <center><button class="btn btn-success btn-xs">Aktif</button></center>



                 <?php  }else {?>

                   <center><button class="btn btn-danger btn-xs">Pasif</button></center>


                 <?php  } ?>




               </td>



               <td><center><a href="urun-duzenle.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="btn btn-primary btn-xs" >Düzenle</button></a></center></td> 

               <td><center><a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'];?>&urunsil=sil"><button class="btn btn-danger btn-xs" >Sil</button></a></center></td>   
             </tr>

           <?php } 

           ?>


         </tbody>
       </table>


       <!--Div içerik bitişi-->

     </div>
   </div>
 </div>
</div>
</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
