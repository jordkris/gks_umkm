<div class="content">
    <?= $this->session->flashdata('message'); ?>
    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="handle_about">
        <br />
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Kelola Halaman Tentang</h4>
                        <p class="category">Wajib<span class="text-danger">*</span></p>
                    </div>
                    <div class="content">
                        <?= form_open_multipart('admin/handle_about'); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Judul Bagian Kiri<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="left_title" placeholder="Masukkan judul bagian kiri" value="<?= $about['left_title']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Judul Bagian Kanan<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="right_title" placeholder="Masukkan judul bagian kiri" value="<?= $about['right_title']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Isi Bagian Kiri<span class="text-danger">*</span></label>
                                        <textarea type="text" class="form-control" name="left_main" placeholder="Masukkan isi bagian kiri" style="height: 200px;" required><?= $about['left_main']; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Isi Bagian Kanan<span class="text-danger">*</span></label>
                                        <textarea type="text" class="form-control" name="right_main" placeholder="Masukkan isi bagian kiri" style="height: 200px;" required><?= $about['right_main']; ?></textarea>
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
</div>