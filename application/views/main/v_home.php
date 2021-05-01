<!-- Begin #carousel-section -->
    <section id="carousel-section" class="section-global-wrapper"> 
        <div class="container-fluid-kamn">
            <div class="row">
                <div id="carousel-1" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-lg">
                        <?php $i = 0; foreach($news_ordered as $no) { if($i < 6) { ?>
                        <li data-target="#carousel-1" data-slide-to="<?= $i; ?>" class="<?php if($i == 0) { echo 'active'; } ?>"></li>
                        <?php $i++;} } ?>
                    </ol>
        
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active wow animated bounceInDown fit-div">
                            <a href="<?= base_url('about'); ?>">
                                <img src="<?= base_url('assets/');?>img/logo/Logo GKS 3.jpg" alt="Image of first carousel" class="fit-image preview_image center-block">
                                <div class="carousel-caption" style="color: black;">
                                    <h4 class="carousel-body custom_caption">GKS UMKM<br />Gerai Kopi & Mi Semarang Usaha Mikro Kecil & Menengah</h4>
                                </div>
                            </a>
                        </div>
                        <?php $i = 0; foreach($news_ordered as $no) { if($i < 5) { ?>
                        <div class="item fit-div">
                            <a href="<?= base_url('news/details/'.$no['random_str']); ?>">
                                <img id="img-carousel-<?= $no['id']; ?>" class="preview_img center-block fit-image" src="<?= base_url('assets/img/news/').$no['image']; ?>" alt="<?= $no['image_caption']; ?>" height="100%" onclick="view_image('img-carousel-<?= $no['id']; ?>')"/>
                                <div class="carousel-caption" style="color: black;">
                                    <h4 class="carousel-body custom_caption"><?= $no['title']; ?></h4>
                                </div>
                            </a>
                        </div>
                        <?php $i++;} } ?>
                    </div>
        
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-1" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-1" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End #carousel-section -->


    <!-- Begin #services-section -->
    <section id="services" class="services-section section-global-wrapper">
        <div class="container">
            <div class="row">
                <div class="services-header">
                    <h3 class="services-header-title">Rincian Fitur</h3>
                    <p class="services-header-body"><hr>
                </div>
            </div>
      
            <!-- Begin Services Row 1 -->
            <div class="row services-row services-row-head services-row-1">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 custom_div">
                    <a href="<?= base_url('product');?>">
                        <div class="services-group wow animated zoomIn" data-wow-offset="40">
                            <p class="services-icon"><span class="fa fa-hamburger fa-5x"></span></p>
                            <h4 class="services-title">Produk</h4>
                            <p class="services-body">Berisi tampilan produk anggota GKS UMKM Kelurahan Tembalang</p>
                        </div>
                    </a>            
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 custom_div">
                    <a href="<?= base_url('news');?>">
                        <div class="services-group wow animated zoomIn" data-wow-offset="40">
                            <p class="services-icon"><span class="fa fa-globe-asia fa-5x"></span></p>
                            <h4 class="services-title">Berita</h4>
                            <p class="services-body">Berisi informasi kegiatan usaha anggota GKS UMKM Kelurahan Tembalang dan kegiatan lainnya</p>
                        </div>
                    </a>            
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 custom_div">
                    <a href="<?= base_url('auth');?>">
                        <div class="services-group wow animated zoomIn" data-wow-offset="40">
                            <p class="services-icon"><span class="fa fa-user fa-5x"></span></p>
                            <h4 class="services-title">Log in</h4>
                            <p class="services-body">Fitur untuk mengelola produk dan berita GKS UMKM Kelurahan Tembalang</p>
                        </div>
                    </a>            
                </div>
            </div>
            <!-- End Serivces Row 1 -->
      
            <!-- Begin Services Row 2 -->
            <div class="row services-row services-row-tail services-row-2">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 custom_div">
                    <a href="<?= base_url('about');?>">
                        <div class="services-group wow animated zoomIn" data-wow-offset="40">
                            <p class="services-icon"><span class="fa fa-sitemap fa-5x"></span></p>
                            <h4 class="services-title">Tentang</h4>
                            <p class="services-body">Berisi profil dan struktur anggota GKS UMKM Kelurahan Tembalang</p>
                        </div>
                    </a>            
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 custom_div">
                    <a href="<?= base_url('feedback');?>">
                        <div class="services-group wow animated zoomIn" data-wow-offset="40">
                            <p class="services-icon"><span class="fa fa-comment fa-5x"></span></p>
                            <h4 class="services-title">Feedback</h4>
                            <p class="services-body">Saran dan masukan untuk platform website GKS UMKM Kelurahan Tembalang</p>
                        </div>
                    </a>            
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 custom_div">
                    <a href="<?= base_url('help');?>">
                        <div class="services-group wow animated zoomIn" data-wow-offset="40">
                            <p class="services-icon"><span class="fa fa-phone fa-5x"></span></p>
                            <h4 class="services-title">Pusat Bantuan</h4>
                            <p class="services-body">Kontak yang bisa dihubungi terkait informasi GKS UMKM Kelurahan Tembalang</p>
                        </div>
                    </a>            
                </div>
            </div>
            <!-- End Serivces Row 2 -->
    
        </div>      
    </section>
    <!-- End #services-section -->