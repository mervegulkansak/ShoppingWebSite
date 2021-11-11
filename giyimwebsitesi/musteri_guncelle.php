<?php error_reporting(0); ?>
<?php 
require_once("baglantidb.php");

//IDYE YE GÖRE GÜNCELLEME YAPILACAK MÜŞTERİNİN GETİRİLMESİ
$sorgu = $db->prepare("SELECT * from tblmusteri_hesaplari where id=:id_alias");
$sorgu->execute(array('id_alias'=>$_GET["id"]));
$kayit=$sorgu->fetch(PDO::FETCH_ASSOC);


 ?>

<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>MGK FASHION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="CSS1/bootstrap.min.css">
  <link rel="stylesheet" href="CSS1/all.css">
  <link rel="stylesheet" type="text/css" href="CSS1/style.css">
  <link rel="stylesheet" type="text/css" href="CSS1/genelstyle.css">
  <link rel="stylesheet" type="text/css" href="CSS1/mainstyle.css">
  <link rel="shortcut icon" type="image" href="img/titlelogo1.ico"/>
</head>
<body>
	<!--VERİTABANINA BAĞLANMA -->
  <?php require_once("baglantidb.php");
  session_start();
   ?>
<?php include ("adminmenu.php") ?>


<div id="main" class="container">
 
    <!--NAVBAR-->
  <?php include("adminnavbar.php"); ?>
<div class="container">
<h5 align="center">MÜŞTERİ GÜNCELLEME</h5>

<!-- Kayıt Formu -->
<form action="ekle.php" method="post" class="row">
     
		

      <div class="textbox col-sm-2  input-icons ">
        <i class="fas fa-star-of-life icon" aria-hidden="true"></i>
        <input class="form-control form-control-sm input-field" type="text" placeholder="Adı*" name="musteri_ad"  required=""  value="<?php echo $kayit["musteri_ad"] ?>" autocomplete="off">
      </div><br><br>

      <div class="textbox col-sm-2 input-icons">
        <i class="fas fa-star-of-life icon"></i>
        <input class="form-control form-control-sm input-field" type="text" placeholder="Soyadı*" name="musteri_soyad"  required=""  value="<?php echo $kayit["musteri_soyad"] ?>" autocomplete="off">
      </div><br><br>

      <div class="textbox col-sm-2 input-icons">
        <i class="fa fa-envelope icon"></i>
        <input class="form-control form-control-sm input-field" type="email" placeholder="E-Posta*" name="musteri_email"  required=""  value="<?php echo $kayit["musteri_email"] ?>" style="text-transform: lowercase;">
      </div><br><br>

      <div class="textbox col-sm-2 input-icons">
        <i class="fa fa-phone icon"></i>
        <input class="form-control form-control-sm input-field" type="text" placeholder="Telefon" name="musteri_tel"  required=""  value="<?php echo $kayit["musteri_tel"] ?>" onkeypress="return event.charCode>=48 && event.charCode<=57">
      </div><br><br>


        <div class="col-sm-2 input-icons">
       <i class="fa fa-user icon"></i>
       <input class="form-control form-control-sm input-field" type="text" placeholder="Kullanıcı Adı*" name="kullanici_adi"  required=""  value="<?php echo $kayit["kullanici_adi"] ?>" style="text-transform: lowercase;">
      </div><br><br>

     

      <div class="textbox col-sm-12 input-icons">
        <i class="fa fa-home icon"></i>
        <textarea class="form-control input-field" type="text" placeholder="Adres" name="musteri_adres"  required=""  value=""><?php echo $kayit["musteri_adres"] ?></textarea>
      </div><br><br><br><br>

      <div class="textbox col-sm-2  input-icons ">
        <input class="form-control form-control-sm input-field" type="text" hidden="" placeholder="ID" name="id"  required=""  value="<?php echo $kayit["id"] ?>" autocomplete="off">
      </div><br><br>


      <button name="btnmusteriguncelle" class="btn btn-success">Müşteri Güncelle</button><br><br>
        







         
    </div>
    </form>
</div>

<script>
function openNav() {
  document.getElementById("YanMenu").style.width = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("YanMenu").style.width = "0";
  document.body.style.backgroundColor = "white";
}
</script>

<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

