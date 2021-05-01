<!DOCTYPE html>
<html>
<head>
    <title>Preview Photo</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="<?= base_url('assets/');?>img/logo/Logo GKS.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/custom.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e59a4bfec.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">
</head>
<style type="text/css">
img {
  display: block;
  max-width: 100%;
}
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
</style>
<body class="bg_general">
<!-- <div class="container">
    <h1>Upload Photo</h1>
    <form method="post">
    <input type="file" name="image" class="image">
    </form>
</div> -->
<div class="container">   
  <div class="row">
    <div class="col-lg-5"></div>
    <div class="col-lg-2">
      <br />
      <a href="<?= base_url('home') ?>"><img src="<?= base_url('assets/');?>img/logo/Logo GKS.png" style="width: 100%;"></a>
      <hr />
    </div>  
    <div class="col-lg-5"></div>
  </div>
  <!-- Outer Row -->
  <div class="row justify-content-center" >
    <div class="col-lg-4">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0 bg-gradient-light">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">

                  <h1 class="h4 text-gray-900 mb-4">Upload Photo</h1>
                </div>
                <form method="post">
                  <div class="form-group">
                    <input type="file" name="image" class="image form-control form-control-user" accept="image/*" height="100">
                  </div>
                </form>
                <div class="text-center">
                  <a onclick="refresh()">
                    <button class="btn btn-primary">
                      <i class="fas fa-sync-alt"></i> Refresh
                    </button>
                  </a>
                  <br />
                  <small>Klik refresh jika terjadi error</small>
                   <hr />
                  <a href="<?= base_url('admin/news/1'); ?>">
                    <button class="btn btn-secondary">
                      <i class="fas fa-arrow-circle-left"></i> Kembali ke halaman awal
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Crop photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="img-container">
            <div class="row">
                <div class="col-md-8">
                    <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                </div>
                <div class="col-md-4">
                    <div class="preview"></div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="back()"><i class="fas fa-times"></i> BATALKAN</button>
        <button type="button" class="btn btn-primary" id="crop" ><i class="fas fa-save"></i> SIMPAN</button>
      </div>
    </div>
  </div>
</div>
<script>
  function refresh() {
    return location = location;
  }
  
  var $modal = $('#modal');
  var image = document.getElementById('image');
  var cropper;
    
  $("body").on("change", ".image", function(e){
      var files = e.target.files;
      var done = function (url) {
        image.src = url;
        $modal.modal('show');
      };
      var reader;
      var file;
      var url;

      if (files && files.length > 0) {
        file = files[0];

        if (URL) {
          done(URL.createObjectURL(file));
        } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
            done(reader.result);
          };
          reader.readAsDataURL(file);
        }
      }
  });

  $modal.on('shown.bs.modal', function () {
      cropper = new Cropper(image, {
      aspectRatio: <?= $width/$height; ?>,
      viewMode: 3,
      preview: '.preview'
      });
  });
  $("#crop").click(function(){
      canvas = cropper.getCroppedCanvas({
        width: <?= $width; ?>,
        height: <?= $height; ?>,
      });

      canvas.toBlob(function(blob) {
          url = URL.createObjectURL(blob);
          var reader = new FileReader();
           reader.readAsDataURL(blob); 
           reader.onloadend = function() {
              var base64data = reader.result;  
              $.ajax({
                  type: "POST",
                  dataType: "json",
                  url: "<?= base_url('admin/edit_upload_photo/'.$random_str); ?>",
                  data: {image: base64data},
                  success: function(data){
                      console.log(data);
                  }
                });
              $modal.modal('hide');
              alert("gambar berhasil diupload");
              redir();
           };
      });
  });
  function redir() {
    window.open('<?= base_url('admin/news/1'); ?>','_self');
  }

  function back() {
    window.open('<?= base_url('admin/news/1'); ?>','_self');
  }
</script>
</body>
</html>