<div class="content">
    <?= $this->session->flashdata('message'); ?>
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item <?= $status['add']; ?>" onclick="replace_uri(0)">
        <a id="nav_add_member" class="nav-link <?= $status['add']; ?>" href="#add_member" role="tab" data-toggle="tab">Tambah Akun Anggota</a>
      </li>
      <li class="nav-item <?= $status['view']; ?>" onclick="replace_uri(1)">
        <a id="nav_member" class="nav-link <?= $status['view']; ?>" href="#member" role="tab" data-toggle="tab">Akun Anggota</a>
      </li>
      <li class="nav-item <?= $status['edit']; ?>" onclick="replace_uri(2)">
        <a id="nav_edit_member" class="nav-link <?= $status['edit']; ?>" href="#edit_member" role="tab" data-toggle="tab">Edit Akun Anggota</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in <?= $status['add']; ?>" id="add_member">
        <br />
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Tambah Akun Anggota</h4>
                        <p class="category"><span class="text-danger">*</span><i>Wajib</i></p>
                    </div>
                    <div class="content">
                        <?= form_open_multipart('admin/add_member'); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Anggota<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Masukkan nama anggota" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username Anggota<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="username" placeholder="Masukkan username anggota" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password Anggota<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password1" placeholder="Masukkan password anggota" value="" min="3" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Konfirmasi Password Anggota<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password2" placeholder="Masukkan ulang password anggota" value="" min="3" required>
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

      <div role="tabpanel" class="tab-pane fade in <?= $status['view']; ?>" id="member">
        <!-- Tabs content -->
        <!-- <div class="container-fluid"> -->
            <br />
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="header">
                                    <h4 class="title">Daftar Anggota</h4>
                                    <p class="category">Klik tombol Tambah anggota untuk menambahkan anggota</p>
                                       
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="#add_member" role="tab" data-toggle="tab" onclick="view_id('nav_add_member','#user_topbar')">
                                    <button class="btn btn-success btn-fill"><i class="fas fa-plus-circle"></i> Tambah Akun Anggota</button>
                                </a>
                            </div>
                        </div>
                        
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th class="text-center">Aksi</th>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Anggota</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">NIB</th>
                                    <th class="text-center">Foto Profil</th>
                                    <th class="text-center">Foto Sampul</th>
                                    <th class="text-center">Alamat Lengkap</th>
                                    <th class="text-center">Nomor HP</th>
                                </thead>
                                <tbody class="text-center">
                                    <?php if($member_count == 0) { ?>
                                        <div class="alert alert-info col-md-12" role="alert"><i class="fas fa-exclamation-circle"></i> Tidak ada anggota tersimpan.<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button></div>
                                    <?php }
                                    $i = 1;
                                    foreach($member as $m) { if($m['role_id'] == 2) { ?>
                                    <tr id="member-<?= $m['id']; ?>">
                                        <td class="text-center">
                                            <a href="#edit_member" role="tab" data-toggle="tab" onclick="view_id('nav_edit_member','#edit_member-<?= $m['id'] ?>')">
                                                <button class="btn btn-warning btn-fill">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                            </a>
                                            <hr />
                                            <a class="btn btn-danger btn-fill" href="<?= base_url('admin/delete_member/'.$m['id']);?>">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                            <hr />
                                            <a class="btn <?php if($m['is_active'] == 0) { echo 'btn-secondary'; } else { echo 'btn-success'; }  ?> btn-fill" href="<?= base_url('admin/change_activation/'.$m['id']);?>">
                                                <i class="fas <?php if($m['is_active'] == 0) { echo 'fa-user-alt-slash'; } else { echo 'fa-user-alt'; }  ?>"></i> <?php if($m['is_active'] == 0) { echo 'Akun tidak aktif'; } else { echo 'Akun Aktif'; }  ?>
                                            </a>
                                        </td>
                                        <td><?= $i; ?></td>
                                        <td><?= $m['name']; ?></td>
                                        <td><?= $m['username']; ?></td>
                                        <td><?= $m['nib']; ?></td>
                                        <td>
                                            <img id="img-member_photo-<?= $i; ?>" class="avatar border-gray preview_img" src="<?= base_url('assets/img/profile/').$m['photo']; ?>" alt="<?= $m['photo']; ?>" width="200" height="200" onclick="view_image('img-member_photo-<?= $i; ?>')"/>
                                        </td>
                                        <td>
                                            <img id="img-member_cover-<?= $i; ?>" class="border-gray preview_img" src="<?= base_url('assets/img/cover/').$m['cover']; ?>" alt="<?= $m['cover']; ?>" width="60" height="20" onclick="view_image('img-member_cover-<?= $i; ?>')"/>
                                        </td>
                                        <td>
                                            <textarea readonly style="height: 100px; width: 300px;">RW <?= $m['rw']; ?>/RT <?= $m['rt']; ?>, <?= $m['address']; ?>
                                            </textarea>
                                        </td>
                                        <td>
                                            <a href="https://wa.me/<?= $m['phone_wa']; ?>" target='_blank'>
                                                <i class="fab fa-whatsapp"></i>
                                                <?= $m['phone']; ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    
      </div>
      <div role="tabpanel" class="tab-pane fade in <?= $status['edit']; ?>" id="edit_member">
        <!-- <div>
            <button href="#member" role="tab" data-toggle="tab" onclick="view_id('nav_member','#member-1')">Member 1</button>
        </div> -->
        <br />
        <div class="content">
            <?= form_open_multipart('admin/edit_member'); ?>
            <?php 
            $i = 0;
            foreach($member as $m) { if($m['role_id'] == 2) { ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img id="img-cover-<?= $m['id']; ?>" class="preview_img" onclick="view_image('img-cover-<?= $m['id']; ?>')" src="<?= base_url('assets/img/cover/').$m['cover']; ?>" alt="<?= $m['cover']; ?>" width="100%"/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <img id="img-profile-<?= $m['id']; ?>" class="avatar border-gray preview_img" src="<?= base_url('assets/img/profile/').$m['photo']; ?>" alt="<?= $m['photo']; ?>" width="120" height="120" onclick="view_image('img-profile-<?= $m['id']; ?>')"/>
                                      <h4 class="title"><?= $m['name']; ?>
                                        <br />
                                        <small>Username : <b><?= $m['username']; ?></b></small><br />
                                      </h4>
                                      <h4 class="title">
                                        <small>NIB : <b><?= $m['nib']; ?></b></small><br />
                                      </h4>
                                      <h4 class="title">
                                            <a href="https://wa.me/<?= $m['phone_wa']; ?>" target="_blank">
                                                <button class="btn btn-success btn-simple">
                                                    <i class="fab fa-whatsapp"></i> +<?= $m['phone_wa']; ?>
                                                </button>
                                            </a>
                                      </h4>
                                      <small>
                                        <?= $m['address']; ?><br />RW 0<?= $m['rw']; ?>, RT 0<?= $m['rt']; ?>
                                      </small>
                                      <?php if ($m['gmap'] != '') { ?>
                                      <hr />
                                      <iframe src="https://www.google.com/maps/embed?pb=<?= $m['gmap'];?>" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                      <?php } ?>
                                </div>
                            </div>
                            <hr />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card" id="edit_member-<?= $m['id']; ?>">
                            <div class="header">
                                <h4 class="title">Edit Akun Anggota (<?= $m['name'] ?>)</h4>
                                <p class="category"><span class="text-danger">*</span><i>Wajib</i></p>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-6" style="display: none;">
                                        <div class="form-group">
                                            <label>ID<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="id-<?= $i; ?>" placeholder="" value="<?= $m['id']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Lengkap<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name-<?= $m['id']; ?>" placeholder="Masukkan nama lengkap" value="<?= $m['name']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Username<span class="text-danger">*</span></label>
                                            <input id="username" type="text" class="form-control" name="username-<?= $m['id']; ?>" placeholder="Masukkan username (angka dan/atau huruf kecil, tanpa spasi)" value="<?= $m['username']; ?>" style="text-transform: lowercase" readonly>
                                            <small>Hanya anggota yang dapat merubah username.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nomor Induk Berusaha (NIB)<span class="text-danger">*</span></label>
                                            <input id="nib" type="text" class="form-control" name="nib-<?= $m['id']; ?>" placeholder="Masukkan NIB" value="<?= $m['nib']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nomor HP / Whatsapp<span class="text-danger">*</span> <i class="fab fa-whatsapp"></i></label>
                                            <input type="text" class="form-control" name="phone-<?= $m['id']; ?>" placeholder="Masukkan nomor hp" value="<?= $m['phone'] ?>" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
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
                                            <textarea type="text" class="form-control" name="address-<?= $m['id']; ?>" placeholder="Masukkan alamat lengkap" style="height: 100px;" required><?= $m['address']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>RW<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="rw-<?= $m['id']; ?>" placeholder="Masukkan RW" value="<?= '0'.$m['rw']; ?>" min="0" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>RT<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="rt-<?= $m['id']; ?>" placeholder="Masukkan RT" value="<?= '0'.$m['rt']; ?>" min="0" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label>Google Map <i class="fas fa-map-marker-alt"></i></label>
                                            <input id="gmap-<?= $m['id']; ?>" type="text" class="form-control" name="gmap-<?= $m['id']; ?>" placeholder="Masukkan google map embed (Boleh kosong)" value="<?= $m['gmap']; ?>">
                                            <a href="#"><small><i class="fas fa-info-circle"></i> Cara memasukkan google map embed</small></a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label></label>
                                            <a class="btn btn-danger btn-fill" onclick="$('#gmap-<?= $m['id']; ?>').val('')">
                                                <i class="fas fa-map-marker-alt"></i> Hapus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-fill pull-right"><i class="fas fa-save"></i> SIMPAN</button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $i++; } } ?>
        <?= form_close(); ?>
        </div>
      </div>
    </div>
</div>