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
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h3 class="lead" style="text-align: center;">Feedback</h3><hr>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="feedback-form">
                        <div id="contact-response"></div>
                        <?= form_open_multipart('feedback/add'); ?>
                            <div class="form-group form-group-fullname">
                                <label class="control-label" for="name">Nama<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama anda" required>
                            </div>
                            <div class="form-group form-group-email">
                                <label class="control-label" for="contact">Nomor HP<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="contact" id="contact" placeholder="Masukkan nomor hp anda" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                            </div>
                            <div class="form-group form-group-message">
                                <label class="control-label" for="main">Isi Feedback<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="main" id="main" rows="3" placeholder="Masukkan kritik dan saran Anda" required></textarea>
                            </div>           
                            <button type="submit" class="btn btn-primary">Submit</button>
                        <?= form_close(); ?>
                    </div> 
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>    
            
    <!--End Main Container -->