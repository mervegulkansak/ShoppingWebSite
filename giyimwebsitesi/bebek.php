 <?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>BEBEK</title>
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
  <?php include("baglantidb.php"); ?>
  <?php include("yanmenu.php"); ?>

  <!--BEBEK KATEGORİSİNE AİT ÜRÜN VERİLERİNİ ÇEKME-->
  <!-- cinsiyetID'si '5' ve '6' olan yani "Erkek Bebek" ve "Kız Bebek" olan ürünleri listeler. -->
  <?php $urunler = $db->query("SELECT * from tblurunler Where cinsiyetID = '5' or cinsiyetID = '6' ", PDO::FETCH_OBJ)->fetchAll()   ?>
  

<div id="main" class="container">
 <?php include("navbar.php"); ?>

    <?php 
     // BEBEK ÜRÜNLERİNDE LİSTELENEN "3/6, 6/9, 9/12, 12/18, 24/36 AY" BEDENLERİNİ YANİ ID Sİ 6 VE 10 ARASINDA OLAN VERİLERİ TBLBEDEN TABLOSUNDAN ÇEKER
      $beden=$db->prepare("SELECT * FROM tblbeden where bedenID BETWEEN '6' AND '10'");
      $beden->execute();
      $satirlar = $beden->fetchALL(PDO::FETCH_ASSOC);
       ?>
      <div class="row">
      <div  class="col-md-4" id="yazi"><i class="fa fa-chevron-right"></i>BEBEK</div>
      </div>

      <div class="row">
        <?php foreach ($urunler as $urunler) { ?>
    <div class="col-md-4">
<div class="card" style="width: 25rem; float: right;">
  <img class="card-img-top" id="aw-zoom" src="<?php echo $urunler->urun_foto; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $urunler->urun_adi; ?></h5>
    <h6><s><?php echo $urunler->eski_fiyat; ?></s> <span style="color: red;">₺<?php echo $urunler->fiyat; ?></span> </h6>   
    <button urun_id="<?php echo $urunler->id; ?>" class="btn btn-warning btn-sm btn_sepeteEkle">Sepete Ekle</button>

    <?php
           //SESSION DAKİ GİRİŞ YAPMIŞ OLAN KULLANICI ID SİNE AİT FAVORİ URUNLERİ ÇEKER
          $sorgu = $db->prepare("SELECT * FROM tblfavoriler WHERE musteriID=:id1 AND favori_urunID=:id2");
          $sorgu->execute(array(':id1'=>$_SESSION['kullanici']['id'],':id2'=>$urunler->id));
          //SESSION DAKİ GİRİŞ YAPMIŞ OLAN KULLANICI ID SİNE GÖRE EKLEME ÇIKARMA İŞLEMLERİ İÇİN favoriler.php SAYFASINA GÖNDERİR.
          //EĞER ÜRÜN FAVORİLERDE İSE BUTON KIRMIZI OLUR VE "FAVORİLERDEN ÇIKAR" YAZAR. 
          if ($sorgu->rowCount()) {
            echo '<a href="favoriler.php?cikar='.$urunler->id.'" class="btn btn-danger btn-sm">Favorilerden Çıkar</a>';
          }else{//FAVORİLERDE DEĞİLSE BUTON YEŞİL OLUR VE BUTON DA FAVORİLERE EKLE YAZAR
            echo '<a href="favoriler.php?id='.$urunler->id.'" class="btn btn-success btn-sm">Favorilere Ekle</a>';
          }
     ?>
     <select>
      <option selected>Ay</option>
      <?php foreach ($satirlar as $satir) {?>
          
           <option value="<?php echo $satir['bedenID']; ?>">
             <?php echo $satir['beden_adi']; ?>
           </option>

         <?php  } ?>
    </select>
  </div>
</div>
  </div>
  <?php } ?>



    </div>















</div>
















</div>
<button id="btnScrollToTop">
    <i class="fa fa-arrow-up fa-2x" style="color: white"></i>
  </button>
<script>
  const btnScrollToTop = document.querySelector("#btnScrollToTop");
  btnScrollToTop.addEventListener("click", function(){
    window.scrollTo(0, 0);
  }); 
</script>
<script>
function openNav() {
  document.getElementById("YanMenu").style.width = "250px";
  
}

function closeNav() {
  document.getElementById("YanMenu").style.width = "0";
  
}
</script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
