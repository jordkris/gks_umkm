<div class="text-center" style="width: 100%;">
    <div class="col-lg-12" style="background-color: white;">
        <a href="https://my.domainesia.com/ref.php?u=14220" target="_blank">
            <img src="https://dnva.me/3194b" alt="DomaiNesia" style="width: 50%;">
        </a>
    </div>
    <div class="col-lg-12" style="background-color: black;color: white;padding-top: 10px;padding-bottom: 10px;">
        &copy; <script>document.write(new Date().getFullYear())</script> <a href="<?= base_url('home');?>">Sistem Informasi GKS UMKM Kelurahan Tembalang</a> oleh Mahasiswa KKN UNDIP TIM 1 2021
    </div>
</div>
<!-- Bootstrap core JavaScript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="<?= base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/')?>js/sb-admin-2.min.js"></script>
  <script>
  	$("input#username").on({
      keydown: function(e) {
        if (e.which === 32)
          return false;
      },
      change: function() {
        this.value = this.value.replace(/\s/g, "");
      }
    }).attr('style','text-transform: lowercase;').attr('pattern','^[a-zA-Z0-9_.-]*$');

  </script>
</body>

</html>