<div class="content">
    <?= $this->session->flashdata('message'); ?>
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item <?= $status['add']; ?>" onclick="replace_uri(0)">
        <a id="nav_add_product" class="nav-link <?= $status['add']; ?>" href="#add_product" role="tab" data-toggle="tab">Tambah Produk</a>
      </li>
      <li class="nav-item <?= $status['view']; ?>" onclick="replace_uri(1)">
        <a id="nav_product" class="nav-link <?= $status['view']; ?>" href="#product" role="tab" data-toggle="tab">Produk</a>
      </li>
      <li class="nav-item <?= $status['edit']; ?>" onclick="replace_uri(2)">
        <a id="nav_edit_product" class="nav-link <?= $status['edit']; ?>" href="#edit_product" role="tab" data-toggle="tab">Edit Produk</a>
      </li>
      <li class="nav-item <?= $status['photo']; ?>" onclick="replace_uri(3)">
        <a id="nav_photo_product" class="nav-link <?= $status['photo']; ?>" href="#photo_product" role="tab" data-toggle="tab">Kelola Gambar</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in <?= $status['add']; ?>" id="add_product">
        <br />
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Tambah Produk Baru</h4>
                        <p class="category"><span class="text-danger">*</span><i>Wajib</i></p>
                    </div>
                    <div class="content">
                        <?= form_open_multipart('owner/add_product'); ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Produk<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Masukkan nama produk" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kategori Produk<span class="text-danger">*</span></label>
                                        <select name="id_category" class="form-select form-control" aria-label="Default select example" required style="font-family: 'FontAwesome', 'sans-serif';">
                                          <option selected value="" style="color: gray;">-- Pilih kategori produk --</option>
                                          <?php foreach($category as $c) { ?>
                                          <option value="<?= $c['id']; ?>"> <?= '&#x'.$c['icon_unicode'].' '.$c['name'];?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Username Instagram Produk <i class="fab fa-instagram"></i></label>
                                        <input type="text" class="instagram form-control" name="instagram" placeholder="Masukkan Username Instagram (jika ada)" value="" pattern="^[a-zA-Z0-9_.-]*$">
                                        <small>Contoh : </small> <br />
                                        <small class="text-success"><i class="fas fa-check-circle"></i> kompastv</small>
                                        <small class="text-danger"><i class="fas fa-times-circle"></i> @kompastv</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Deskripsi<span class="text-danger">*</span></label>
                                        <textarea type="text" class="form-control" name="description" placeholder="Masukkan deskripsi" style="height: 100px;" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Tambahkan Gambar Produk</label>
                                        <input id="input_photo" class="form-control" type="file" name="photo" style="" accept="image/*" onclick="handle_upload(1,'')"  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- <div class="form-group"> -->
                                        <div id="preview_photo" class="row" style="max-height:500px;border:1px solid #ccc;overflow:auto;"></div>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <a id="refresh_photo" class="btn btn-primary btn-fill form-control" onclick="location = location;"><i class="fas fa-redo-alt"></i> Refresh</a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-fill form-control"><i class="fas fa-save"></i> SIMPAN</button>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div role="tabpanel" class="tab-pane fade in <?= $status['view']; ?>" id="product">
        <!-- Tabs content -->
        <!-- <div class="container-fluid"> -->
            <br />
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="header">
                                    <h4 class="title">Daftar Produk</h4>
                                    <p class="category">Klik tombol Tambah produk untuk menambahkan produk</p>
                                       
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="#add_product" role="tab" data-toggle="tab" onclick="view_id('nav_add_product','#user_topbar')">
                                    <button class="btn btn-success btn-fill"><i class="fas fa-plus-circle"></i> Tambah Produk</button>
                                </a>
                            </div>
                        </div>
                        
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th class="text-center">Aksi</th>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Produk</th>
                                    <th class="text-center">Logo Produk</th>
                                    <th class="text-center">Deskripsi</th>
                                    <th class="text-center">Instagram</th>
                                </thead>
                                <tbody class="text-center">
                                    <?php if($product_count == 0) { ?>
                                        <div class="alert alert-info col-md-12" role="alert"><i class="fas fa-exclamation-circle"></i> Tidak ada produk tersimpan.<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button></div>
                                    <?php }
                                    $i = 1;
                                    foreach($product as $p) { ?>
                                    <tr id="product-<?= $p['id']; ?>">
                                        <td class="text-center">
                                            <a href="#photo_product" role="tab" data-toggle="tab" onclick="view_id('nav_photo_product','#photo_product-<?= $p['id'] ?>')">
                                                <button class="btn btn-primary btn-fill">
                                                    <i class="far fa-images"></i> Kelola gambar
                                                </button>
                                            </a>
                                            <hr />
                                            <a href="#edit_product" role="tab" data-toggle="tab" onclick="view_id('nav_edit_product','#edit_product-<?= $p['id'] ?>')">
                                                <button class="btn btn-warning btn-fill">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                            </a>
                                            <hr />
                                            <a class="btn btn-danger btn-fill" href="<?= base_url('owner/delete_product/'.$p['id']);?>">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                        <td><?= $i; ?></td>
                                        <td><?= $p['name']; ?></td>
                                        <td>
                                            <img id="img-product_logo1-<?= $i; ?>" class="avatar border-gray preview_img" src="<?= base_url('assets/img/product/').$p['logo']; ?>" alt="<?= $p['logo']; ?>" width="200" height="200" onclick="view_image('img-product_logo1-<?= $i; ?>')"/>
                                        </td>
                                        <td>
                                            <textarea readonly style="height: 100px; width: 300px;"><?= $p['description']; ?>
                                            </textarea>
                                        </td>
                                        <td>
                                            <a href="https://instagram.com/<?= $p['instagram']; ?>" target='_blank'>
                                                <img class="avatar border-gray" src="<?= base_url('assets/img/logo/instagram.png'); ?>" width="120" height="120" />
                                                <?= $p['instagram']; ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    
      </div>
      <div role="tabpanel" class="tab-pane fade in <?= $status['edit']; ?>" id="edit_product">
        <!-- <div>
            <button href="#product" role="tab" data-toggle="tab" onclick="view_id('nav_product','#product-1')">Product 1</button>
        </div> -->
        <br />
        <div class="content">
            <?php if($product_count == 0) { ?>
                <div class="alert alert-info col-md-12" role="alert"><i class="fas fa-exclamation-circle"></i> Tidak ada produk tersimpan.<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button></div>
            <?php } ?>
            <?= form_open_multipart('owner/edit_product'); ?>
            <?php 
            $i = 0;
            foreach($product as $p) { ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img id="umkm-cover" class="preview_img" onclick="view_image('umkm-cover')" src="<?= base_url('assets/img/cover/default-cover.jpg'); ?>" alt="Logo GKS.png" width="100%"/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <img id="img-product_logo-<?= $p['id']; ?>" class="avatar border-gray preview_img" src="<?= base_url('assets/img/product/').$p['logo']; ?>" alt="<?= $p['logo']; ?>" width="120" height="120" onclick="view_image('img-product_logo-<?= $p['id']; ?>')"/>
                                      <h4 class="title"><?= $p['name']; ?></h4>
                                      
                                      <small>
                                        <?= nl2br(str_replace('', ' ', htmlspecialchars($p['description']))); ?>
                                      </small>
                                      <h4 class="title">
                                            <a href="https://wa.me/<?= $profile['phone_wa']; ?>" class="btn btn-success btn-simple" target="_blank">
                                                <i class="fab fa-whatsapp"></i> +<?= $profile['phone_wa']; ?>
                                            </a>
                                      </h4>
                                      <?php if($p['instagram'] != '') { ?>
                                          <div class="title">
                                              <a href="https://instagram.com/<?= $p['instagram']; ?>" target='_blank'>
                                                <img class="border-gray" src="<?= base_url('assets/img/logo/instagram.png'); ?>" width="30" height="30" />
                                                <?= $p['instagram']; ?>
                                              </a>
                                          </div>
                                      <?php } ?>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a href="<?= base_url('owner/change_photo/product_logo-'.$p['id']); ?>" class="btn btn-warning btn-fill">
                                    <i class="fas fa-edit"></i> Ganti logo produk
                                </a>
                                <hr />
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card" id="edit_product-<?= $p['id']; ?>">
                            <div class="header">
                                <h4 class="title">Edit Produk (<?= $p['name'] ?>)</h4>
                                <p class="category"><span class="text-danger">*</span><i>Wajib</i></p>
                            </div>
                            <div class="content">
                                <!-- kosong -->
                                    <div class="row">
                                        <div class="col-md-6" style="display: none;">
                                            <div class="form-group">
                                                <label>ID<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="id-<?= $i; ?>" value="<?= $p['id']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Nama Produk<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="name-<?= $p['id']; ?>" placeholder="Masukkan nama produk" value="<?= $p['name']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Kategori Produk<span class="text-danger">*</span></label>
                                                <select name="id_category-<?= $p['id']; ?>" class="form-control"  required style="font-family: 'FontAwesome', 'sans-serif';">
                                                  <option value="" style="color: gray;">-- Pilih kategori produk --</option>
                                                  <?php foreach($category as $c) { ?>
                                                  <option value="<?= $c['id']; ?>" <?php if($c['id'] == $p['id_category']) { echo 'selected';}?> > <?= '&#x'.$c['icon_unicode'].' '.$c['name'];?></option>
                                                  <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Deskripsi<span class="text-danger">*</span></label>
                                                <textarea type="text" class="form-control" name="description-<?= $p['id']; ?>" placeholder="Masukkan deskripsi" style="height: 100px;" required><?= $p['description']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Username Instagram Produk <i class="fab fa-instagram"></i></label>
                                                <input type="text" class="instagram form-control" name="instagram-<?= $p['id']; ?>" placeholder="Masukkan Username Instagram" value="<?= $p['instagram'] ?>" pattern="^[a-zA-Z0-9_.-]*$" >
                                                <small>Contoh : </small> <br />
                                                <small class="text-success"><i class="fas fa-check-circle"></i> kompastv</small>
                                                <small class="text-danger"><i class="fas fa-times-circle"></i> @kompastv</small>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#photo_product" role="tab" data-toggle="tab" onclick="view_id('nav_photo_product','#photo_product-<?= $p['id'] ?>')">
                                        <button class="btn btn-primary btn-fill">
                                            <i class="far fa-images"></i> Kelola gambar
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-success btn-fill pull-right"><i class="fas fa-save"></i> SIMPAN</button>
                                    <div class="clearfix"></div>
                                <!-- kosong -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php $i++; } ?>
        <?= form_close(); ?>
        </div>

      </div>

      <div role="tabpanel" class="tab-pane fade in <?= $status['photo']; ?>" id="photo_product">
          <br />
        <div class="content">
            <?php if($product_count == 0) { ?>
                <div class="alert alert-info col-md-12" role="alert"><i class="fas fa-exclamation-circle"></i> Tidak ada produk tersimpan.<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button></div>
            <?php } ?>
            <?php 
            $i = 0;
            foreach($product as $p) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" id="photo_product-<?= $p['id']; ?>">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img id="img-product_logo-<?= $p['id']; ?>" class="border-gray preview_img" src="<?= base_url('assets/img/product/').$p['logo']; ?>" alt="<?= $p['logo']; ?>" width="75" height="75" onclick="view_image('img-product_logo-<?= $p['id']; ?>')"/>
                                    </div>
                                    <div class="col-md-11">
                                        <h4 class="title">Kelola Gambar Produk (<?= $p['name']; ?>)</h4>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <p class="category">Klik <b><i class="fas fa-trash"></i> Hapus</b> untuk menghapus gambar</p>
                                                <p class="category">Klik <b>Choose File / Pilih File</b> untuk mengupload gambar.</p>
                                            </div>
                                            <div class="col-sm-4">
                                                <p class="category">Klik <b><i class="fas fa-redo-alt"></i> Refresh</b> jika terjadi error</p>
                                                <p class="category">Klik <b><i class="fas fa-save"></i> Simpan</b> untuk mengupload gambar.</p>
                                            </div>
                                            <div class="col-sm-1">
                                                <a href="<?= base_url('owner/change_photo/product_logo-'.$p['id']); ?>" class="btn btn-warning btn-fill">
                                                    <i class="fas fa-edit"></i> Ganti logo produk
                                                </a>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="content">
                                <small class="category">Upload Gambar</small>
                                <?= form_open_multipart('owner/upload_product_photo/'.$p['id']); ?>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input id="input_photo-<?= $p['id']; ?>" class="form-control" type="file" name="photo" accept="image/*" onclick="handle_upload(2,'<?= $p['id']; ?>')" />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button id="submit_photo-<?= $p['id']; ?>" type="submit" class="btn btn-success btn-fill pull-right form-control" style="display: none;"><i class="fas fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <a id="refresh_photo-<?= $p['id']; ?>" class="btn btn-primary btn-fill pull-right form-control" style="display: none;" onclick="location = location"><i class="fas fa-redo-alt"></i> Refresh</a>
                                            </div>
                                        </div>
                                    </div>
                                <?= form_close(); ?>
                            </div>
                            <div class="content">
                                <div class="row" style="max-height:500px;border:1px solid #ccc;overflow:auto;">
                                    <div id="preview_photo-<?= $p['id']; ?>" class="row" style="max-height:500px;border:1px solid #ccc;overflow:auto;margin-inline: auto;"></div>
                                </div>
                            </div>
                            <div class="content">
                                <!-- kosong -->
                                <small class="category">Gambar Tersimpan</small>
                                    <div class="row" style="max-height:500px;border:1px solid #ccc;overflow:auto;">
                                        <?php 
                                        $ci = get_instance();
                                        $product_photo_count = $this->m_product->get_photo_count($p['id']);
                                        if($product_photo_count == 0) { ?>
                                            <div class="alert alert-info col-md-12" role="alert"><i class="fas fa-exclamation-circle"></i> Tidak ada gambar tersimpan.<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button></div>
                                        <?php }
                                        foreach($product_photo as $pp) { 
                                            if($pp['id_product'] == $p['id']) {
                                        ?>
                                        <div class="col-md-3" id="div_photo-<?= $pp['id']; ?>" style="border: 1px solid black; padding-top: 15px;">
                                            <div class="form-group">
                                                <a class="btn btn-danger btn-fill" style="position: absolute;z-index: 1">
                                                    <span rel="noopener noreferrer" onclick="delete_photo(<?= $pp['id']; ?>)"><i class="fas fa-trash"></i> Hapus</span>
                                                </a>

                                                <img id="img-product-<?= $pp['id']; ?>" class="border-gray preview_img" src="<?= base_url('assets/img/product/').$pp['name']; ?>" alt="<?= $pp['name']; ?>" width="100%" onclick="view_image('img-product-<?= $pp['id']; ?>')" style="position: relative;"/>
                                            </div>
                                        </div>
                                        <?php } } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                <!-- kosong -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php $i++; } ?>
        </div>
      </div>
    </div>
</div>