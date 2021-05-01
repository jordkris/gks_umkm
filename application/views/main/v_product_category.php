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

    <hr />
    <h5 class="services-header-title text-center"><a href="<?= base_url('product'); ?>">Semua Produk</a> <i class="fas fa-chevron-right"></i> Kategori <?= $subtitle; ?></h5>
    <!-- Begin #services-section -->
    <section id="services" class="services-section section-global-wrapper">
        <div class="container">
            <div class="row">
                <div class="services-header">
                    <h3 class="services-header-title"><?= $subtitle; ?></h3>
                    <p class="services-header-body"><hr>
                </div>
            </div>
            <div class="row">
                <?php foreach($product as $p) { if($p['id_category'] == $id_category) { ?>
                <div class="col-md-4">
                    <!-- height 530 standart -->
                    <iframe src="<?= base_url('product/show_product/'.$p['id']);?>" style="max-height: 800px;overflow: hidden;" width="100%" height="650" scrolling="no" frameBorder="0" ></iframe>
                </div>
                <?php } } ?>
            </div>
            <!-- Begin Services Row 1 -->
            
        </div>
    </section>
    <!-- End #services-section -->
    