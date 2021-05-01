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
    <div class="row justify-content-center">

      <div class="col-lg-7">
        <a href="<?= base_url('home') ?>"><h3 class="lead" style="text-align: center;">Kembali ke halaman awal</h3></a>
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0 bg-gradient-light">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user username" id="username" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username..." value="" style="text-transform: lowercase">
                      <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder=" Enter Password..." value="">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small btn btn-info btn-user btn-block" href="<?= base_url('auth/registration') ?>">Buat Akun Baru!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
