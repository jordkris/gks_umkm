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
<!-- Main Container -->
        <div class="container-fluid-kamn">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <h3 class="lead" style="text-align: center;">Pusat Bantuan</h3><hr>
                    <p class="block-author">GKS UMKM Kelurahan Tembalang</p>
                    <table class="table table-hover table-bordered">
                        <tr>
                            <td>Alamat</td>
                            <td>Jl. Baskoro Raya No 36B, Kel. Tembalang, Kec. Tembalang, Kota Semarang, Jawa Tengah</td>
                        </tr>
                        <tr>
                            <td>Nomor HP 1</td>
                            <td>
                                <a href="https://wa.me/6285802138884" style="color: green;" target="_blank">
                                        <i class="fab fa-whatsapp"></i> Kasmiran - 085802138884
                                </a> 
                            </td>
                        </tr>
                        <tr>
                            <td>Nomor HP 2</td>
                            <td>
                                <a href="https://wa.me/62895415471385" style="color: green;" target="_blank">
                                        <i class="fab fa-whatsapp"></i> Piliani Ernawati - 0895415471385
                                </a> 
                            </td>
                        </tr>
                    </table>
                    <!-- <div>
                        <a href="#"><img src="assets/img/social-icons/btn_facebook.png" alt="Facebook"></a>
                        Sukai kita
                    </div> -->
                    <br>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>    
            
    <!--End Main Container -->