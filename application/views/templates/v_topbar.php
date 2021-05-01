<!-- Header -->
        
<nav id="navbar-section" class="navbar navbar-default navbar-static-top navbar-sticky" role="navigation" style="position: sticky;top: 0; background-color: rgba(255,255,255,0.75);z-index: 100;">
    <div class="container">
    
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand wow fadeInDownBig" href="<?= base_url('home');?>">
                <img class="office-logo" src="<?= base_url('assets/');?>img/logo/Logo GKS.png" alt="Office">
            </a>
            <a class="wow fadeInDownBig" href="<?= base_url('home');?>">
                <h5 style="font-family: cursive; color: black"><b>SIGULANG</b> (<b>S</b>istem <b>I</b>nformasi <b>G</b>KS <b>U</b>MKM Kelurahan Temba<b>lang</b>)</h5>
            </a>
        </div>
    
        <div id="navbar-spy" class="collapse navbar-collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav pull-right">
                <li class="<?php if($title == 'Home') { echo 'active';}?>">
                    <a href="<?= base_url('home');?>"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="<?php if($title == 'Produk') { echo 'active';}?>">
                    <a href="<?= base_url('product');?>"><i class="fa fa-hamburger"></i> Produk GKS UMKM</a>
                </li>
                <li class="<?php if($title == 'Berita') { echo 'active';}?>">
                    <a href="<?= base_url('news');?>"><i class="fa fa-globe-asia"></i> Berita</a>
                </li>
                <li class="dropdown1 <?php if($title == 'Tentang' || $title == 'Feedback' || $title == 'Pusat Bantuan') { echo 'active';}?>">
                    <a class="dropbtn1">Lainnya <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown1-content">
                        <a href="<?= base_url('auth') ?>"><i class="fa fa-user"></i> Log In</a>
                        <a href="<?= base_url('about');?>"><i class="fa fa-sitemap"></i> Tentang</a>
                        <a href="<?= base_url('feedback');?>"><i class="fa fa-comment"></i> Feedback</a>
                        <a href="<?= base_url('help');?>"><i class="fa fa-phone"></i> Pusat Bantuan</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- End Header -->