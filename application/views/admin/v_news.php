<div class="content">
    <?= $this->session->flashdata('message'); ?>
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item <?= $status['add']; ?>" onclick="replace_uri(0)">
        <a id="nav_add_news" class="nav-link <?= $status['add']; ?>" href="#add_news" role="tab" data-toggle="tab">Tambah Berita</a>
      </li>
      <li class="nav-item <?= $status['view']; ?>" onclick="replace_uri(1)">
        <a id="nav_news" class="nav-link <?= $status['view']; ?>" href="#news" role="tab" data-toggle="tab">Berita</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in <?= $status['add']; ?>" id="add_news">
        <br />
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Tambah Berita Baru</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a class="btn btn-primary btn-fill text-center" href="<?= base_url('admin/add_news_photo/');?>"><i class="fas fa-image"></i> Upload Gambar Berita</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div role="tabpanel" class="tab-pane fade in <?= $status['view']; ?>" id="news">
        <!-- Tabs content -->
        <!-- <div class="container-fluid"> -->
            <br />
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="header">
                                    <h4 class="title">Daftar Berita</h4>
                                    <p class="category">Klik tombol Tambah anggota untuk menambahkan anggota</p>
                                       
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="#add_news" role="tab" data-toggle="tab" onclick="view_id('nav_add_news','#user_topbar')">
                                    <button class="btn btn-success btn-fill"><i class="fas fa-plus-circle"></i> Tambah Berita</button>
                                </a>
                            </div>
                        </div>
                        
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th class="text-center">Aksi</th>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Judul Berita</th>
                                    <th class="text-center">Gambar</th>
                                    <th class="text-center">Isi Berita</th>
                                    <th class="text-center">Penulis</th>
                                    <th class="text-center">Tanggal</th>
                                </thead>
                                <tbody class="text-center">
                                    <?php if($news_count == 0) { ?>
                                        <div class="alert alert-info col-md-12" role="alert"><i class="fas fa-exclamation-circle"></i> Tidak ada berita tersimpan.<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button></div>
                                    <?php }
                                    $i = 1;
                                    foreach($news as $n) { ?>
                                    <tr id="news-<?= $n['id']; ?>">
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/preview_news/'.$n['random_str']); ?>">
                                                <button class="btn btn-warning btn-fill">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                            </a>
                                            <hr />
                                            <a class="btn btn-primary btn-fill" href="<?= base_url('admin/edit_news_photo/'.$n['random_str']);?>">
                                                <i class="fas fa-image"></i> Ganti Gambar
                                            </a>
                                            <hr />
                                            <a class="btn btn-danger btn-fill" href="<?= base_url('admin/delete_news/'.$n['random_str']);?>">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                        <td><?= $i; ?></td>
                                        <td><?= $n['title']; ?></td>
                                        <td>
                                            <img id="img-news-<?= $i; ?>" class="border-gray preview_img" src="<?= base_url('assets/img/news/').$n['image']; ?>" alt="<?= $n['image_caption']; ?>" width="200" height="100" onclick="view_image('img-news-<?= $i; ?>')"/>
                                        </td>
                                        <td>
                                            <textarea readonly style="height: 100px; width: 300px;"><?= nl2br(str_replace('', ' ', htmlspecialchars($n['main']))); ?>
                                            </textarea>
                                        </td>
                                        <td><?= $n['author']; ?></td>
                                        <td><?= date('d F Y' , $n['date_created']);?></td>
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
    </div>
</div>