
<?php include 'header.php'; 
include 'nedmin/netting/baglan.php';

$kullanicisor = $db -> prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
	'mail' => @$_SESSION['userkullanici_mail']
));

$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor -> fetch(PDO::FETCH_ASSOC);

?>






<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Hesap Bilgileri Güncelleme</div>
							<?php 

							if (@$_GET['durum']== "ok") {?>


								<b style="color:green;"> İşlem Başarılı...</b>


							<?php } elseif (@$_GET['durum']=="no") {?>


								<b style="color:red;"> İşlem Başarısız...</b>


							<?php }

							?>
							<p >Güncellemek istediğiniz bilgileril aşağıdan güncelleyebilirsiniz.</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">

				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control" disabled="" required="" name="kullanici_adsoyad" placeholder="<?php echo $kullanicicek['kullanici_adsoyad'] ?>">
					</div>
					
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="email" class="form-control"  required="" name="kullanici_mail"  placeholder="<?php echo $kullanicicek['kullanici_mail'] ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" class="form-control" required="" name="kullanici_gsm"  placeholder="<?php echo "GSM Numaranız" ?>">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"   name="kullanici_il" placeholder="<?php echo "İl " ?>">
					</div>
					
				</div>
				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"   name="kullanici_ilce" placeholder="<?php echo "İlçe" ?>">
					</div>	
				</div>
				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"   name="kullanici_adres" placeholder="<?php echo "Adres"?>">
					</div>	
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="password" class="form-control" name="kullanici_passwordone"    placeholder="Şifrenizi Giriniz...">
					</div>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="kullanici_passwordtwo"   placeholder="Şifrenizi Tekrar Giriniz...">
					</div>
				</div>

				<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_idx']; ?>">


				<button type="submit" name="hesapbilgiguncelle" class="btn btn-default btn-red">Bilgilerimi Güncelle</button>
			</div>

			<!--<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifrenizi mi Unuttunuz?</div>
				</div>


				<center><img width="400" src="dimg/tosbig.png"></center>
			</div>-->
			
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>