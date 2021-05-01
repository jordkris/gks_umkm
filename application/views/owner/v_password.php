<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img id="img-cover-<?= $profile['id']; ?>" class="preview_img" onclick="view_image('img-cover-<?= $profile['id']; ?>')" src="<?= base_url('assets/img/cover/').$profile['cover']; ?>" alt="<?= $profile['cover']; ?>" width="100%"/>
                    </div>
                    <div class="content">
                        <div class="author">
                            <img id="img-profile-<?= $profile['id']; ?>" class="avatar border-gray preview_img" src="<?= base_url('assets/img/profile/').$profile['photo']; ?>" alt="<?= $profile['photo']; ?>" width="120" height="120" onclick="view_image('img-profile-<?= $profile['id']; ?>')"/>
                              <h4 class="title"><?= $profile['name']; ?>
                                <br />
                                <small>Username : <b><?= $profile['username']; ?></b></small><br />
                              </h4>
                              <h4 class="title">
                                <small>NIB : <b><?= $profile['nib']; ?></b></small><br />
                              </h4>
                              <h4 class="title">
                                    <a href="https://wa.me/<?= $profile['phone']; ?>">
                                        <button class="btn btn-success btn-simple">
                                            <i class="fab fa-whatsapp"></i> +<?= $profile['phone_wa']; ?>
                                        </button>
                                    </a>
                              </h4>
                              <small>
                                <?= $profile['address']; ?><br />RW 0<?= $profile['rw']; ?>, RT 0<?= $profile['rt']; ?>
                              </small>
                              <?php if ($profile['gmap'] != '') { ?>
                              <hr />
                              <iframe src="https://www.google.com/maps/embed?pb=<?= $profile['gmap'];?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                              <?php } ?>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="<?= base_url('owner/change_photo/profile'); ?>">
                            <button class="btn btn-warning btn-simple">
                                <i class="fas fa-edit"></i> Ganti foto profil
                            </button>
                        </a>
                        <a href="<?= base_url('owner/change_photo/cover'); ?>">
                            <button class="btn btn-warning btn-simple">
                                <i class="fas fa-edit"></i> Ganti foto sampul
                            </button>
                        </a>
                        <hr />
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Ubah Password</h4>
                        <p class="category"><span class="text-danger">*</span><i>Wajib</i></p>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="content">
                        <?= form_open_multipart('owner/change_password'); ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Password Lama<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="current_password" placeholder="Masukkan passsword lama" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password Baru<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="new_password1" placeholder="Masukkan passsword baru" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Konfirmasi Password Baru<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="new_password2" placeholder="Masukkan ulang passsword baru" value="" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-fill pull-right"><i class="fas fa-save"></i> SIMPAN</button>
                            <div class="clearfix"></div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>