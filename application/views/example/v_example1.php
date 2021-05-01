<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Silahkan beralih ke link lain</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?= base_url('assets/');?>css/custom.css" rel="stylesheet">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Hind:400,700");
        html, body {
          font-family: 'Hind', sans-serif;
          margin: 0;
          padding: 0;
          background-color: #d9e2fd;
          width: 100%;
          height: 100%;
          position: fixed;
        }

        img {
          max-width: 100%;
          height: auto;
          display: block;
        }

        h3 {
          text-align: center;
          font-weight: 400;
          margin-bottom: 0;
        }

        .carousel-wrapper {
          position: relative;
          width: 100%;
          height: 100%;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          background-color: #FFFFFF;
          background-image: linear-gradient(#FFFFFF 50%, #FFFFFF 50%, #F0F3FC 50%);
          box-shadow: 0px 12px 39px -19px rgba(0, 0, 0, 0.75);
          overflow-x: hidden;
        }
        .carousel-wrapper .carousel {
          position: absolute;
          top: 50%;
          transform: translateY(-50%);
          width: 100%;
          height: auto;
        }
        .carousel-wrapper .carousel .carousel-cell {
          padding: 10px;
          background-color: #FFFFFF;
          width: 20%;
          height: auto;
          min-width: 120px;
          margin: 0 20px;
          transition: transform 500ms ease;
        }
        .carousel-wrapper .carousel .carousel-cell .more {
          display: block;
          opacity: 0;
          margin: 5px 0 15px 0;
          text-align: center;
          font-size: 10px;
          color: #CFCFCF;
          text-decoration: none;
          transition: opacity 300ms ease;
        }
        .carousel-wrapper .carousel .carousel-cell .more:hover, .carousel-wrapper .carousel .carousel-cell .more:active, .carousel-wrapper .carousel .carousel-cell .more:visited, .carousel-wrapper .carousel .carousel-cell .more:focus {
          color: #CFCFCF;
          text-decoration: none;
        }
        .carousel-wrapper .carousel .carousel-cell .line {
          position: absolute;
          width: 2px;
          height: 0;
          background-color: black;
          left: 50%;
          margin: 5px 0 0 -1px;
          transition: height 300ms ease;
          display: block;
        }
        .carousel-wrapper .carousel .carousel-cell .price {
          position: absolute;
          font-weight: 700;
          margin: 45px auto 0 auto;
          left: 50%;
          transform: translate(-50%);
          opacity: 0;
          transition: opacity 300ms ease 300ms;
        }
        .carousel-wrapper .carousel .carousel-cell .price sup {
          top: 2px;
          position: absolute;
        }
        .carousel-wrapper .carousel .carousel-cell.is-selected {
          transform: scale(1.2);
        }
        .carousel-wrapper .carousel .carousel-cell.is-selected .line {
          height: 35px;
        }
        .carousel-wrapper .carousel .carousel-cell.is-selected .price, .carousel-wrapper .carousel .carousel-cell.is-selected .more {
          opacity: 1;
        }
        .carousel-wrapper .flickity-page-dots {
          display: none;
        }
        .carousel-wrapper .flickity-viewport, .carousel-wrapper .flickity-slider {
          overflow: visible;
        }

    </style>

  </head>
  <body class="bg_general">
    
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://unpkg.com/flickity@2.0/dist/flickity.min.css">
<script src="https://unpkg.com/flickity@2.0/dist/flickity.pkgd.min.js"></script>
<div class="carousel-wrapper">
<div class="row">
        <div class="col-lg-5"></div>
        <div class="col-lg-2">
          <br />
          <a href="https://gksumkmkelurahantembalang.xyz"><img src="<?= base_url('assets/');?>img/logo/Logo GKS.png" style="width: 100%;"></a>
          <hr />
        </div>  
        <div class="col-lg-5"></div>
    </div>
    <br />
  <div class="carousel" data-flickity>
    <?php foreach($product as $p) { ?>
    <div class="carousel-cell">

      <a href="https://gksumkmkelurahantembalang.xyz" style="color: black;"><h3><?= $p['name']; ?></h3></a>
      
      <a href="https://gksumkmkelurahantembalang.xyz"><img src="<?= base_url('assets/img/product/'.$p['logo']); ?>" /></a>
      <div class="line"></div>
      <div class="price">
        <?php foreach($users as $u) { if($u['id'] == $p['id_user']) { ?>
        <span style="align: center;"><?= $u['name']; ?></span><br />
        <span style="color: grey;">Alamat URL GKS UMKM Pindah ke alamat di bawah ini : </span><a href="https://gksumkmkelurahantembalang.xyz"><span>https://gksumkmkelurahantembalang.xyz</span></a>
        <?php }} ?>
        <br />
      </div>
    </div>
    <?php } ?>

  </div>
</div>
<div class="row">
    <div class="col-lg-5"></div>
    <div class="col-lg-2">

    </div>  
    <div class="col-lg-5"></div>
</div>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </script>
  </body>
</html>