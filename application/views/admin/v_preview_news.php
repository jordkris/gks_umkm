<div class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tampilan Pra Upload</h4>
                                <hr />
                                <h5 class="title"><b id="news_title"></b></h5>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img id="img-news" class="border-gray preview_img" src="<?= base_url('assets/img/news/').$news['image']; ?>" alt="<?= $news['image']; ?>" width="100%" onclick="view_image('img-news')"/>
                                        <small id="img_caption"></small>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="min-height: 200px;max-height:200px;border:1px solid #ccc;overflow:auto;">
                                            <p id="main" class="text-justify"></p>
                                        </div>
                                        <br />
                                        <p class="text-left"><i class="fas fa-user"></i> Ditulis oleh : <span><b id="author"></b></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tambah Berita Baru</h4>
                                <p class="category"><span class="text-danger">*</span><i>Wajib</i></p>
                            </div>
                            <div class="content">
                                <?= form_open_multipart('admin/add_news/'.$random_str); ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Keterangan Gambar<span class="text-danger">*</span></label>
                                                <input id="img_caption_input" type="text" class="form-control" name="image_caption" placeholder="Masukkan keterangan gambar" value="<?= $news['image_caption']; ?>" required>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Penulis Berita<span class="text-danger">*</span></label>
                                                <input id="author_input" type="text" class="form-control" name="author" placeholder="Masukkan penulis berita" value="<?= $news['author']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Judul Berita<span class="text-danger">*</span></label>
                                                <input id="news_title_input" type="text" class="form-control" name="title" placeholder="Masukkan judul berita" value="<?= $news['title']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Isi Berita<span class="text-danger">*</span></label>
                                                <textarea id="main_input" type="text" class="form-control" name="main" placeholder="Masukkan isi berita" value="" required style="height: 200px;"><?= $news['main']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <a class="btn btn-danger btn-fill pull-left" href="<?= base_url('admin/delete_news/'.$random_str);?>"><i class="fas fa-trash"></i> HAPUS</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-fill pull-right"><i class="fas fa-save"></i> SIMPAN</button>
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
        </div>
    </div>
</div>