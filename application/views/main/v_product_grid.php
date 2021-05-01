<div class="row services-row services-row-head services-row-1" width="10000">
    <div class="container">
        <div class="row">
            <?php foreach($product as $p) { if($p['id'] == $id_product) { ?>
            <div class="col-md-4 wow animated zoomIn">
                <!-- komponen panel di sini  -->
                <div class="panel panel-default card">
                    <div class="panel-heading post-thumb" style="background-color: transparent;">
                        <a class="img img-responsive">
                            <div id="carousel-example-generic-<?= $p['id'] ?>" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <!-- <ol class="carousel-indicators"> -->
                                    
                                    <!-- <li data-target="#carousel-example-generic-" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic-" data-slide-to="2"></li>
                                    <li data-target="#carousel-example-generic-" data-slide-to="3"></li> -->
                                <!-- </ol> -->
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item fit-div active wow animated zoomIn">
                                        <img id="img_product-logo-<?= $p['id']; ?>" class="preview_img center-block fit-image" src="<?= base_url('assets/img/product/'.$p['logo']); ?>" alt="<?= $p['logo']; ?>" onclick="view_image('img_product-logo-<?= $p['id']; ?>')" />
                                        <!-- <img id="img-product_logo-" class="avatar border-gray preview_img" src="" alt="" width="120" height="120" onclick="view_image('img-product_logo-')"/> -->
                                    </div>
                                    <?php $i = 0;
                                    foreach($product_photo as $pp) { if($pp['id_product'] == $p['id']) { ?>
                                    <div class="item fit-div wow animated zoomIn">
                                        <img id="img-product-<?= $pp['id']; ?>" class="preview_img center-block fit-image" src="<?= base_url('assets/img/product/'.$pp['name']); ?>" alt="<?= $pp['name']; ?>" onclick="view_image('img-product-<?= $pp['id']; ?>')" />
                                        <!-- <img id="img-product_logo-" class="avatar border-gray preview_img" src="" alt="" width="120" height="120" onclick="view_image('img-product_logo-')"/> -->
                                    </div>
                                    <?php $i++; }} ?>
                                    <!-- <div class="item fit-div">
                                        <img src="./img/product/1_1.jpg" alt="" class="center-block fit-image" />
                                    </div>
                                    <div class="item fit-div">
                                        <img src="./img/product/1_5.jpg" alt="" class="center-block fit-image" />
                                    </div>
                                    <div class="item fit-div">
                                        <img src="./img/product/1_5_2.jpg" alt="" class="center-block fit-image" />
                                    </div> -->
                                </div>
                                <!-- Controls -->

                                <a class="left carousel-control" href="#carousel-example-generic-<?= $p['id']; ?>" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic-<?= $p['id']; ?>" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </a>
                    </div>
                    <div class="panel-body post-body" style="height: 390px;">
                        <?php foreach($product_category as $pc) { if($pc['id'] == $p['id_category']) { ?>
                        <div class="text-center">
                            <a class="label label-default" href="<?= base_url('product/category/'.$pc['icon_unicode']); ?>" target="_parent"><i class="<?= $pc['icon']; ?>"></i> <?= $pc['name']; ?></a>
                        </div>
                        <?php }} ?>
                            <div class="post-title text-center">
                                <br />
                                <img id="img-product-logo-<?= $p['id']; ?>" class="border-gray preview_img center-block fit-image" src="<?= base_url('assets/img/product/'.$p['logo']); ?>" alt="<?= $p['logo']; ?>" onclick="view_image('img-product-logo-<?= $p['id']; ?>')" width="100" height="100" />
                                <br />
                                <b><?= $p['name']; ?></b>
                                <div style="max-height:100px;border:1px solid #ccc;overflow:auto;">
                                    <?php if($p['instagram'] != '') { ?>
                                    <a href="https://instagram.com/<?= $p['instagram']; ?>" style="color: blue;" target='_blank'>
                                        <img class="border-gray" src="<?= base_url('assets/img/logo/instagram.png'); ?>" width="30" height="30" />
                                            <?= $p['instagram']; ?>
                                    </a>
                                    <?php } ?>
                                    <p class="h6 text-justify">
                                        <?= nl2br(str_replace('', ' ', htmlspecialchars($p['description']))); ?>
                                    </p>
                                </div>
                            <div class="post-author">
                                <small style="text-align: center;">Info lebih lanjut & pemesanan :</small><br />
                                <?php foreach($users as $u) { if($u['id'] == $p['id_user']) { ?>
                                <a href="<?= base_url('product/owner/'.$u['username']); ?>" target="_parent">
                                    <img class="author-photo" height="32" src="<?= base_url('assets/img/profile/'.$u['photo']); ?>" width="32">
                                    <small style="color: blue;"><?= $u['name'] ?></small>
                                </a>
                                <a href="https://wa.me/<?= $u['phone_wa']; ?>" style="color: green;" target="_blank">
                                        <small><i class="fab fa-whatsapp"></i> +<?= $u['phone_wa']; ?></small>
                                </a> 
                                <?php }} ?>
                                
                            </div>
                    </div>
                </div>
            </div>
            <?php } } ?>
            <!-- end row -->
        </div>
    </div>
</div> 


    <div id="preview_modal" class="preview_modal">
      <span class="preview_close">&times;</span>
      <img class="preview_modal-content" id="preview_modal_img">
      <div id="preview_caption"></div>
    </div>
    
    
    </div>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js/jquery-1.10.2.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/wow.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <script>
        new WOW().init();

        setTimeout(function() {
          $('#loader').remove();
        }, 1000);

        function view_image(image_id){
            // Get the modal
            var modal = document.getElementById("preview_modal");
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById(image_id);
            var modalImg = document.getElementById("preview_modal_img");
            var captionText = document.getElementById("preview_caption");
            // img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = img.src;
            captionText.innerHTML = img.alt;
            // }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("preview_close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
              modal.style.display = "none";
            };
        }
    </script>