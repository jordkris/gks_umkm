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
                                    <a href="https://wa.me/<?= $profile['phone_wa']; ?>" target="_blank">
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
                        <h4 class="title">Edit Profil</h4>
                        <p class="category"><span class="text-danger">*</span><i>Wajib</i></p>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="content">
                        <?= form_open_multipart('owner/edit_profile'); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Masukkan nama lengkap" value="<?= $profile['name']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username<span class="text-danger">*</span></label>
                                        <input id="username" type="text" class="form-control username" name="username" placeholder="Masukkan username (angka dan/atau huruf kecil, tanpa spasi)" value="<?= $profile['username']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Induk Berusaha (NIB)<span class="text-danger">*</span></label>
                                        <input id="nib" type="text" class="form-control" name="nib" placeholder="Masukkan NIB" value="<?= $profile['nib']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor HP / Whatsapp<span class="text-danger">*</span> <i class="fab fa-whatsapp"></i></label>
                                        <input type="text" class="form-control" name="phone" placeholder="Masukkan nomor hp" value="<?= $profile['phone'] ?>" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        <small>Contoh : </small> <br />
                                        <small class="text-success"><i class="fas fa-check-circle"></i> 081234567890</small>
                                        <small class="text-danger"><i class="fas fa-times-circle"></i> 6281234567890</small><br />
                                        <small class="text-danger"><i class="fas fa-times-circle"></i> +6281234567890</small>
                                        <small class="text-danger"><i class="fas fa-times-circle"></i> 81234567890</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Alamat Lengkap<span class="text-danger">*</span></label>
                                        <textarea type="text" class="form-control" name="address" placeholder="Masukkan alamat lengkap" style="height: 100px;" required><?= $profile['address']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>RW<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="rw" placeholder="Masukkan RW" value="<?= '0'.$profile['rw']; ?>" min="0" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>RT<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="rt" placeholder="Masukkan RT" value="<?= '0'.$profile['rt']; ?>" min="0" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>Google Map <i class="fas fa-map-marker-alt"></i></label>
                                        <input id="gmap" type="text" class="form-control" name="gmap" placeholder="Masukkan google map embed (Boleh kosong)" value="<?= $profile['gmap']; ?>">
                                        <a href="#"><small><i class="fas fa-info-circle"></i> Cara memasukkan google map embed</small></a>
                                    </div>
                                </div>
                                
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label></label>
                                        <a class="btn btn-danger btn-fill" onclick="$('#gmap').val('')">
                                            <i class="fas fa-map-marker-alt"></i> Hapus
                                        </a>
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