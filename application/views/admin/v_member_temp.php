<div class="content">
    <?= $this->session->flashdata('message'); ?>
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item <?= $status['add']; ?>" onclick="replace_uri(0)">
        <a id="nav_add_member" class="nav-link <?= $status['add']; ?>" href="#add_member" role="tab" data-toggle="tab">Tambah Anggota</a>
      </li>
      <li class="nav-item <?= $status['view']; ?>" onclick="replace_uri(1)">
        <a id="nav_member" class="nav-link <?= $status['view']; ?>" href="#member" role="tab" data-toggle="tab">Anggota</a>
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
                        <h4 class="title">Tambah Anggota</h4>
                        <p class="category"><i>Wajib</i></p>
                    </div>
                    <div class="content">
                        <?= form_open_multipart('admin/add_member_temp'); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Anggota<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Masukkan nama anggota" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIB</label>
                                        <input type="text" class="form-control" name="nib" placeholder="Masukkan nib anggota" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Usaha</label>
                                        <input type="text" class="form-control" name="product_name" placeholder="Masukkan nama usaha anggota" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="number" class="form-control" name="rw" placeholder="Masukkan RW anggota" value="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="number" class="form-control" name="rt" placeholder="Masukkan RT anggota" value="">
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
                                    <button class="btn btn-success btn-fill"><i class="fas fa-plus-circle"></i> Tambah Anggota</button>
                                </a>
                            </div>
                        </div>
                        <?= form_open_multipart('admin/edit_member_temp'); ?>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Anggota</th>
                                    <th class="text-center">NIB</th>
                                    <th class="text-center">Nama Usaha</th>
                                    <th class="text-center">RW</th>
                                    <th class="text-center">RT</th>
                                    <th class="text-center">Aksi</th>
                                </thead>
                                <tbody class="text-center">
                                    <?php if($member_count == 0) { ?>
                                        <div class="alert alert-info col-md-12" role="alert"><i class="fas fa-exclamation-circle"></i> Tidak ada anggota tersimpan.<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button></div>
                                    <?php }
                                    $i = 1;
                                    foreach($member as $m) {  ?>
                                    <tr>
                                        <td style="display: none;">
                                            <input type="text" name="id-<?= $i; ?>" value="<?= $m['id']; ?>">
                                        </td>
                                        <td style="width: 10px;"><?= $i; ?></td>
                                        <td><input type="text" name="name-<?= $i; ?>" value="<?= $m['name']; ?>"></td>
                                        <td><input type="text" name="nib-<?= $i; ?>" value="<?= $m['nib']; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"></td>
                                        <td><input type="text" name="product_name-<?= $i; ?>" value="<?= $m['product_name']; ?>"></td>
                                        <td><input type="number" name="rw-<?= $i; ?>" value="<?= $m['rw']; ?>" style="width: 40px;" min="0"></td>
                                        <td><input type="number" name="rt-<?= $i; ?>" value="<?= $m['rt']; ?>" style="width: 40px;" min="0"></td>
                                        <td class="text-center">
                                            <button type="submit" class="btn btn-success btn-fill"><i class="fas fa-save"></i> Simpan</button>
                                            <hr />
                                            <a class="btn btn-danger btn-fill" href="<?= base_url('admin/delete_member_temp/'.$m['id']);?>">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        <!-- </div> -->
      </div>
    </div>
</div>