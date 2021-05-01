<!-- Begin #carousel-section -->
    <section id="carousel-section" class="section-global-wrapper"> 
        <div class="container-fluid-kamn">
            <div class="row">
                <div id="carousel-1" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ol class="carousel-indicators visible-lg">
                        <?php $i = 0; foreach($news_ordered_asc as $no) { if($i < 5) { ?>
                        <li data-target="#carousel-1" data-slide-to="<?= $i; ?>" class="<?php if($i == 0) { echo 'active'; } ?>"></li>
                        <?php $i++;} } ?>
                    </ol>
        
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php $i = 0; foreach($news_ordered_asc as $no) { if($i < 5) { ?>
                        <div class="item fit-div <?php if($i == 0) { echo 'active'; } ?>">
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
    <h5 class="services-header-title text-center"><a href="<?= base_url('news'); ?>">Semua Berita</a> <i class="fas fa-chevron-right"></i> <?= $news['title']; ?></h5>
    <hr />
    <!-- Main Container -->
    <div id="banners"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="blog-post">
                    <h3 class="text-justify"><b><?= $news['title']; ?></b></h3>
                    <br />
                    <img id="img-news-<?= $news['id']; ?>" class="border-gray preview_img" src="<?= base_url('assets/img/news/').$news['image']; ?>" alt="<?= $news['image_caption']; ?>" align="right" width="100%" onclick="view_image('img-news-<?= $news['id']; ?>')"/>
                    <h6 class="text-center"><?= $news['image_caption']; ?></h6>
                    <br />
                    <p class="text-justify"><?= nl2br(str_replace('', ' ', htmlspecialchars($news['main']))); ?></p>
                    <div>
                        <span class="badge"><i class="fas fa-calendar-alt"></i> Dipublikasikan pada <?= date('d F Y' , $news['date_created']);?></span>
                        <div class="pull-right">
                            <span class="label label-primary"><i class="fas fa-user"></i> Penulis : <?= $news['author']; ?></span>
                            <span class="label label-success"><i class="far fa-eye"></i> <?= $news['views']; ?> kali dilihat</span>
                        </div>         
                    </div>
                </div>
                <hr />
            </div>

            <div class="col-md-3">
                <h3 class="services-header-title text-center">Berita Populer</h3>
                <hr />
                <?php $i = 0; foreach($news_ordered as $no) { if($i < 5) { ?>
                <div class="row">
                    <div class="col-md-3">
                        <br />
                        <img id="img-news2-<?= $no['id']; ?>" class="border-gray preview_img" src="<?= base_url('assets/img/news/').$no['image']; ?>" alt="<?= $no['image_caption']; ?>" align="right" width="100%" onclick="view_image('img-news2-<?= $no['id']; ?>')"/>
                    </div>
                    <div class="col-md-9">
                        <a href="<?= base_url('news/details/'.$no['random_str']); ?>"><h6 class="text-justify" style="color: black;"><b><?= substr($no['title'],0,60); ?>....</b></h6><a>
                        <span class="label label-success"><i class="far fa-eye"></i> <?= $no['views']; ?> kali dilihat</span>
                    </div>
                </div>
                <hr />
                <?php $i++; } } ?>
            </div>
        </div>
    </div>
