<?php
    session_start();
  if($_SESSION['login'] == true){
    header('Location: login.php');
  }
    include "koneksi.php";
    $sql = "SELECT `id_monitoring`, `waktu`,`nilai`,`tanggalwaktu`, FROM `monitoring` ORDER BY `tanggalwaktu` DESC LIMIT 10";
    $sql_tabel = "SELECT `id_monitoring`, `waktu,`nilai`,`tanggalwaktu`, FROM `monitoring`";
    $result = $koneksi->query($sql);
    $hasil = $koneksi->query($sql_tabel);

    $kategori = array();
    $id_monitoring = array();
    $waktu = array();
    $nilai = array();

    // while($rc = mysqli_fetch_assoc($result)){
    //   array_unshift($kategori,array("label"=>$rc["tanggal"]));
    //   array_unshift($id_monitoring,array("value"=>$rc["id_monitoring"]));
    //   array_unshift($waktu,array("value"=>$rc["waktu"]));
    //   array_unshift($nilai,array("value"=>$rc["nilai"]));
    // }

    $kategori = json_encode($kategori);
    $id_monitoring = json_encode($id_monitoring);
    $waktu = json_encode($waktu);
    $nilai = json_encode($nilai);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MONITORING BATAS LAUT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html" />
  <meta name="author" content="lolkittens" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.css" rel="stylesheet"/>
  <link href="css/style.css" rel="stylesheet"/>
  <link href="css/lightbox.css" rel="stylesheet"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style>
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #818181;
  }
  h2 {
    font-size: 40px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }
  h4 {
    font-size: 30px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
  }  
  .jumbotron {
    background:url('images/BG.jpg');
    color: #fff;
    padding: 300px 25px;
    font-family: Montserrat, sans-serif;
  }
  .container-fluid {
    padding: 150px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: #f4511e;
    font-size: 50px;
  }
  .logo {
    color: #f4511e;
    font-size: 200px;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail img {
    width: 100%;
    height: 100%;
    margin-bottom: 10px;
  }
  
  .navbar {
    margin-bottom: 0;
    background-color: black;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #f4511e !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }
  footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: #f4511e;
  }
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">MOPBWIL</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#beranda">BERANDA</a></li>
        <li><a href="#sensor">SENSOR</a></li>
        <li><a href="#tentang">TENTANG</a></li>
        <li><a href="#galeri">GALERI</a></li>
        <li><a href="#contact">KONTAK</a></li>
        <li><a href="logout.php">KELUAR</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>SISTEM MONITORING</h1> 
  <p>BATAS LAUT</p>
</div>

<div class="container-fluid bg-grey" id="beranda">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Beranda</h2><br>
      <h4>Selamat Datang di Website Monitoring Batas Laut </h4><br>
      <p>Monitoring Penentu Batas Wilayah Laut  merupakan perangkat lunak yang akan menampilkan 
      sebuah notifikasi dari peringatan kepada kapal yang lewat dari batas 
      laut yang telah di tentukan.</p>
      <p>Download laporan sensor</p>
      <script type="text/javascript">
        function download(d) {
                if (d == 'Select document') return;
                window.location = 'http://localhost/sensorlaut2/' + d;
        }
      </script>
      
      <select name="download" onChange="download(this.value)" style="border-radius: 30px;padding: 10px 20px;">
        <option>Select document</option>
        <option value="downloadPdf.php">Sensor 1</option>
        <option value="downloadPdf2.php">Sensor 2</option>
        <option value="downloadPdf3.php">Sensor 3</option>
        <option value="downloadPdf4.php">Sensor 4</option>
      </select>
    
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="sensor" class="container-fluid text-center" style="background-image: url(images/sensor.jpg)" style="background-repeat: no-repeat;" style="background-size: 300px 100px">
  <h2 style="color: white">Sensor</h2>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
      <h4 style="color: white">ALAT PENGUKUR BATAS LAUT</h4>
      <p style="color: white">Alat ini mampu mendeteksi kapal yang masuk ke wilayah laut</p>
      <a href="checkout.php"><button type="button" class="btn btn-primary">Nyalakan Sensor</button></a>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>

<div class="container-fluid bg-grey" id="tentang">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-education logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Tentang Kami</h2><br>
      <h4>Selamat Datang di Website Monitoring Batas Laut </h4><br>
      <p style="padding: 20px">Sistem informasi ini bergantung pada kondisi alat dan kondisi dari internet serta 
      ketersediaan database yang digunakan. Sensor ini akan mengirim notifikasi kepada 
      admin dan akan muncul notifikasi kapal yang masuk ke daerah perbatasan. 
      Informasi yang ditampilkan web sangat bergantung dengan konektivitas serta 
      data yang dikirimkan oleh sensor.</p>
    </div>
  </div>
</div>

 <div id="galeri" class="container">
        <div class="row mtb-60">
            <div class="heading">
                <h1>Gallery</h1>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="well">
                        <img src="images/1.jpg" width="330px" height="300px">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="well">
                        <img src="images/2.jpg" width="330px" height="300px">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="well">
                        <img src="images/3.jpg" width="330px" height="300px">
                    </div>
                </div>
            </div>
          </div>
 </div>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Kontak kami 24 Jam</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Bogor</p>
      <p><span class="glyphicon glyphicon-phone"></span> +62251 777777</p>
      <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <form action="contact.php" method="POST">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <input type="submit" value="Send">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
</footer>

<script>
$(document).ready(function(){
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();

      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        window.location.hash = hash;
      });
    } 
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
