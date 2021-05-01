<!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6" style="background-color: white;">
                        <a href="https://my.domainesia.com/ref.php?u=14220" target="_blank">
                            <img src="https://dnva.me/3194b" alt="DomaiNesia" style="width: 100%;">
                        </a>
                    </div>
                    <div class="col-lg-6" style="margin-top: 25px;margin-bottom: 25px;">
                        &copy; 2021 Mahasiswa KKN UNDIP TIM 1, <a href="<?= base_url('home');?>">Sistem Informasi GKS UMKM Kelurahan Tembalang</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- The Modal -->
    <div id="preview_modal" class="preview_modal">
      <span class="preview_close">&times;</span>
      <img class="preview_modal-content" id="preview_modal_img">
      <div id="preview_caption"></div>
    </div>
    </div>
    </div>
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

        $(document).ready(function(){

            demo.initChartist();
            type = ['info','success','warning'];
            color = Math.floor((Math.random() * 3) + 1);
            $.notify({
                icon: "pe-7s-portfolio",
                message: "Selamat Datang di <b>Sistem Informasi GKS UMKM Kelurahan Tembalang</b>"
            },{
                type: type[color],
                timer: 1000,
                placement: {
                    from: 'top',
                    align: 'left'
                }
            });
        });

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
                window.open(window.location.origin+'/owner/delete_product_photo/'+id,'_blank');
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
        $(document).ready(function() {
            //keyup
            $('#img_caption_input').keyup(function() {
                $('#img_caption').html($(this).val());
            });
            $('#news_title_input').keyup(function() {
                $('#news_title').html($(this).val());
            });
            $('#main_input').keyup(function() {
                $('#main').html($(this).val());
            });
            $('#author_input').keyup(function() {
                $('#author').html($(this).val());
            });

            //change
            $('#img_caption_input').change(function() {
                $('#img_caption').html($(this).val());
            });
            $('#news_title_input').change(function() {
                $('#news_title').html($(this).val());
            });
            $('#main_input').change(function() {
                $('#main').html($(this).val());
            });
            $('#author_input').change(function() {
                $('#author').html($(this).val());
            });

            //ready
            $('#img_caption_input').mouseover(function() {
                $('#img_caption').html($(this).val());
            });

            $('#news_title_input').mouseover(function() {
                $('#news_title').html($(this).val());
            });

            $('#main_input').mouseover(function() {
                $('#main').html($(this).val());
            });

            $('#author_input').mouseover(function() {
                $('#author').html($(this).val());
            });
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

