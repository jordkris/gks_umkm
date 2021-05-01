<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="<?= base_url('assets/');?>img/logo/Logo GKS.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title><?= $title; ?></title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="<?= base_url('assets/');?>css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/');?>css/animate.min.css" rel="stylesheet"/>
    <link href="<?= base_url('assets/');?>css/preview_image.css" rel="stylesheet"/>
    <link href="<?= base_url('assets/');?>css/cursor.css" rel="stylesheet"/>
    <link href="<?= base_url('assets/');?>css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="<?= base_url('assets/');?>css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />


    <!--     Fonts and icons     -->
    <script src="https://kit.fontawesome.com/5e59a4bfec.js" crossorigin="anonymous"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?= base_url('assets/');?>css/pe-icon-7-stroke.css" rel="stylesheet" />
    <style>
        .preview {
          overflow: hidden;
          width: 160px; 
          height: 160px;
          margin: 10px;
          border: 1px solid red;
        }
        .modal-lg{
          max-width: 1000px !important;
        }
        html, body {
          height: 100%;
        }

        .container{
          width:1025px;
        }

        .vertical-center {
          height:100%;
          width:100%;

          text-align: center;  /* align the inline(-block) elements horizontally */
          font: 0/0 a;         /* remove the gap between inline(-block) elements */
        }

        .vertical-center:before {    /* create a full-height inline block pseudo=element */
          content: ' ';
          display: inline-block;
          vertical-align: middle;  /* vertical alignment of the inline element */
          height: 100%;
        }

        .vertical-center > .container {
          max-width: 100%;
          background-color: transparent;

          display: inline-block;
          vertical-align: middle;  /* vertical alignment of the inline element */
          font: 16px/1 "Helvetica Neue", Helvetica, Arial, sans-serif;        /* <-- reset the font property */
        }

        @media (max-width: 768px) {
          .vertical-center:before {
            /* height: auto; */
            display: none;
          }
        }
    </style>
</head>
<body>
<div class="jumbotron d-flex align-items-center" style="background-color: transparent;">
<div class="container text-center">
<?php foreach($users as $u) { if($u['id'] == $id_owner) { ?>
<div class="card card-user text-center center-block" style="width: 90%;">
    <div class="image">
        <img id="img-cover-<?= $u['id']; ?>" class="preview_img" onclick="view_image('img-cover-<?= $u['id']; ?>')" src="<?= base_url('assets/img/cover/').$u['cover']; ?>" alt="<?= $u['cover']; ?>" width="100%"/>
    </div>
    <div class="content">
        <div class="author">
            <img id="img-profile-<?= $u['id']; ?>" class="avatar border-gray preview_img" src="<?= base_url('assets/img/profile/').$u['photo']; ?>" alt="<?= $u['photo']; ?>" width="120" height="120" onclick="view_image('img-profile-<?= $u['id']; ?>')"/>
              <h4 class="title"><?= $u['name']; ?></h4>
              <h4 class="title">
                <small>NIB : <b><?= $u['nib']; ?></b></small><br />
              </h4>
              <h4 class="title">
                    <a href="https://wa.me/<?= $u['phone_wa']; ?>" target="_blank">
                        <button class="btn btn-success btn-simple">
                            <i class="fab fa-whatsapp"></i> +<?= $u['phone_wa']; ?>
                        </button>
                    </a>
              </h4>
              <small>
                <?= $u['address']; ?><br />RW 0<?= $u['rw']; ?>, RT 0<?= $u['rt']; ?>
              </small>
              <?php if ($u['gmap'] != '') { ?>
              <hr />
              <iframe src="https://www.google.com/maps/embed?pb=<?= $u['gmap'];?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              <?php } ?>
        </div>
    </div>
</div>
<?php } } ?>
</div>
</div>

        <!-- The Modal -->
    <div id="preview_modal" class="preview_modal">
      <span class="preview_close">&times;</span>
      <img class="preview_modal-content" id="preview_modal_img">
      <div id="preview_caption"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/wow.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <script src="<?= base_url('assets/'); ?>js/chartist.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap-notify.js"></script>
    <script src="<?= base_url('assets/'); ?>js/demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
    <script>
        new WOW().init();

        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip(); 
        });
        setTimeout(function() {
          $('#loader').remove();
        }, 1000);

        // $(document).ready(function(){

        //     demo.initChartist();
        //     type = ['info','success','warning','danger', 'primary'];
        //     color = Math.floor((Math.random() * 3) + 1);
        //     $.notify({
        //         icon: "pe-7s-portfolio",
        //         message: "Selamat Datang di <b>Sistem Informasi GKS UMKM Kelurahan Tembalang</b>"
        //     },{
        //         type: type[color],
        //         timer: 1000,
        //         placement: {
        //             from: 'top',
        //             align: 'left'
        //         }
        //     });
        // });

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

        function view_image_tooltip() {
            var x = document.getElementsByClassName('preview_img');
            for (var i=0; i<x.length; i++) {
                x[i].setAttribute('data-toggle', 'tooltip');
                x[i].setAttribute('data-placement', 'top');
                // x[i].setAttribute('title', 'Lihat gambar');
            }
        }
        view_image_tooltip();

        function view_id(tabx, directionx) {
            document.getElementById(tabx).click();
            setTimeout(function(){
                window.open(directionx,'_self');
            }, 500);
        }

        function delete_photo(id) {
            div_photo = document.getElementById('div_photo-'+id);
            div_photo.style.display =  'none';
            // setTimeout(function(){
                window.open(window.location.origin+'/website/gksumkm/owner/delete_product_photo/'+id,'_blank');
            // }, 1000);
        }

        function replace_uri(id) {
            window.history.pushState('page2', 'Title', id);
        }

        function setAttr_photo_upload() {
            x = document.getElementsByClassName('image_generated');
            var name;
            for (var i=0; i<x.length; i++) {
                name = 'photo_upload-'+i;
                x[i].setAttribute('id', name);
                x[i].setAttribute('alt', name);
                x[i].setAttribute('onclick', "view_image('"+name+"'')");
            }
        }
        function handle_upload(task, id_product) {

            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;
                    console.log(filesAmount);
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        
                        reader.onload = function(event) {                    
                            $($.parseHTML('<img>')).attr('src', event.target.result).attr('class','col-md-2 border-gray preview_img image_generated').attr('width','100%').attr('style','max-height:500px;padding: 10px;border: 1px solid black;').appendTo(placeToInsertImagePreview);
                        };
                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };
            var setAttr_photo_upload = function() {
                x = document.getElementsByClassName('image_generated');
                var name;
                for (var i=0; i<x.length; i++) {
                    name = 'photo_upload-'+i;
                    x[i].setAttribute('id', name);
                    x[i].setAttribute('alt', name);
                    x[i].setAttribute('onclick', "view_image('"+name+"')");
                }
            };

            var upload_task1 = function() {
                $('#input_photos').on('change', function() {
                    $('#drag_and_drop').remove();
                    $('#preview_photos').empty();
                    // document.getElementById('#preview_photos').style.display = '';
                    imagesPreview(this, 'div#preview_photos');
                    setTimeout(function(){ 
                        setAttr_photo_upload();
                        $('#input_photos').css('opacity', '1');
                        $('#input_photos').css('position', '');
                    }, 2000);
                });
            };

            var upload_task2 = function(id_product) {
                $('#input_photos-'+id_product).on('change', function() {
                    $('#preview_photos-'+id_product).empty();
                    imagesPreview(this, 'div#preview_photos-'+id_product);
                    setTimeout(function(){ 
                        setAttr_photo_upload();
                        $('#input_photos-'+id_product).css('opacity', '1');
                        $('#input_photos-'+id_product).css('position', '');
                    }, 2000);
                });
                
                display_action_photo(id_product);
            }
            console.log('id_product '+id_product);
            if(task == 1) {
                upload_task1();
            } else if(task == 2) {
                upload_task2(id_product);
            }
        }

        function display_action_photo(id_product) {
            document.getElementById('submit_photo-'+id_product).style.display = '';
            document.getElementById('refresh_photo-'+id_product).style.display = '';
        }

        $("input#username").on({
          keydown: function(e) {
            if (e.which === 32)
              return false;
          },
          change: function() {
            this.value = this.value.replace(/\s/g, "");
          }
        });

        // $('.instagram').keypress(
        //   function(event){
        //     if (event.which == '50') {
        //       event.preventDefault();
        //     }
        // });
        // function removeElementsByClass(className){
        //     var elements = document.getElementsByClassName(className);
        //     while(elements.length > 0){
        //         elements[0].src = '';
        //         elements[0].parentNode.removeChild(elements[0]);
        //     }
        // }
        // function refresh_photo(id_product) {
        //     if (id_product != '') {
        //         console.log(document.getElementById('input_photos-'+id_product).value);
        //         document.getElementById('input_photos-'+id_product).value = '';
        //         // $('#preview_photos-'+id_product).empty();
        //         // $('.image_generated-'+id_product).remove();
        //         removeElementsByClass('image_generated');
        //     } else {
        //         console.log(document.getElementById('input_photos').value);
        //         document.getElementById('input_photos').value = '';
        //         // $('#preview_photos').empty();
        //         // $('.image_generated').remove();
        //         removeElementsByClass('image_generated');
        //     }
        // }

    </script>
  </body>
</html>

