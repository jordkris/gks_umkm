<!-- Footer -->
    <footer style="width: 100%;"> 
        <div class="container" >
            <div class="row">
                <div class="col-md-6">
                    <h5 style="color: black;"><i class="fa fa-map-marker"></i> Google Map Kelurahan Tembalang</h5>
                    <h5>Sumber : <a href="https://goo.gl/maps/AAqmuqFa8DhPQXhDA" target="_blank"><i class="fa fa-external-link-alt"></i> Google Map</a></h5>
                    <div class="wow animated zoomIn">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15838.513967936138!2d110.43041977702755!3d-7.052865818495018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c1cc3e9a915%3A0x5027a76e356dcb0!2sTembalang%2C%20Kec.%20Tembalang%2C%20Kota%20Semarang%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1611236834571!5m2!1sid!2sid" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" frameborder="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:500%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px" height="400" width="100%"></iframe>
                    </div>
                    
                </div>
              <div class="col-md-6">
                <h5><i class="fa fa-map-marker"></i> Peta Admisnistratif Kelurahan Tembalang</h5>
                    <h5>Sumber : <a href="https://tembalang.semarangkota.go.id/en/profilkelurahan" target="_blank"><i class="fa fa-external-link-alt"></i> tembalang.semarangkota.go.id</a></h5>
                <img id="peta_kelurahan_tembalang" class="preview_img wow animated zoomIn" src="https://tembalang.semarangkota.go.id/medias/page/big/1/peta-kelurahan-tembalang-edited-8-mar-2018-703x1024.jpg" alt="peta_kelurahan_tembalang" width="100%" onclick="view_image('peta_kelurahan_tembalang')" style="width: 100%;" /> 
              </div>    
        </div>
      </div>
    </footer>
    <div id="preview_modal" class="preview_modal">
      <span class="preview_close">&times;</span>
      <img class="preview_modal-content" id="preview_modal_img">
      <div id="preview_caption"></div>
    </div>
    <div class="text center" style="width: 100%;">
        <div class="col-lg-12" style="background-color: white;">
            <a href="https://my.domainesia.com/ref.php?u=14220" target="_blank">
                <img src="https://dnva.me/3194b" alt="DomaiNesia" style="width: 50%;">
            </a>
        </div>
        <div class="col-lg-12" style="background-color: black;color: white;padding-top: 10px;padding-bottom: 10px;">
            &copy; <script>document.write(new Date().getFullYear())</script> <a href="<?= base_url('home');?>">Sistem Informasi GKS UMKM Kelurahan Tembalang</a> oleh Mahasiswa KKN UNDIP TIM 1 2021
        </div>
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

        $(document).ready(function() {
          $("#myCarousel2").on("slide.bs.carousel2", function(e) {
            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 3;
            var totalItems = $(".carousel2-item").length;

            if (idx >= totalItems - (itemsPerSlide - 1)) {
              var it = itemsPerSlide - (totalItems - idx);
              for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                  $(".carousel2-item")
                    .eq(i)
                    .appendTo(".carousel2-inner");
                } else {
                  $(".carousel2-item")
                    .eq(0)
                    .appendTo($(this).find(".carousel2-inner"));
                }
              }
            }
          });
        });
    </script>
  </body>
</html>

