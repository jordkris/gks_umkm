<div class="wrapper">
<div class="sidebar" data-color="blue" data-image="<?= base_url('assets/');?>img/sidebar-5.jpg">

<!--

    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
    Tip 2: you can also add an image using data-image tag

-->

	<div class="sidebar-wrapper">
        <div class="logo">
            <a href="<?= base_url('admin');?>" class="simple-text">
                <img src="<?= base_url('assets/');?>img/logo/Logo GKS.png" style="width: 100%; height:100%;">
            </a>
        </div>

        <ul class="nav">
            <li class="<?php if($title == 'Kelola Anggota UMKM') { echo 'active';}?>">
                <a href="<?= base_url('admin/member_temp/'); ?>">
                    <i class="fas fa-user"></i>
                    <p>Kelola Anggota UMKM</p>
                </a>
            </li>
            <li class="<?php if($title == 'Kelola Akun Terdaftar Anggota UMKM') { echo 'active';}?>">
                <a href="<?= base_url('admin/member/'); ?>">
                    <i class="fas fa-user-shield"></i>
                    <p>Kelola Akun Terdaftar Anggota UMKM</p>
                </a>
            </li>
            <li class="<?php if($title == 'Kelola Berita') { echo 'active';}?>">
                <a href="<?= base_url('admin/news/'); ?>">
                    <i class="far fa-newspaper"></i>
                    <p>Kelola Berita</p>
                </a>
            </li>
            <li class="<?php if($title == 'Kelola Halaman Tentang') { echo 'active';}?>">
                <a href="<?= base_url('admin/about/'); ?>">
                    <i class="fas fa-sitemap"></i>
                    <p>Kelola Halaman Tentang</p>
                </a>
            </li>
            <li class="<?php if($title == 'Feedback Pengguna') { echo 'active';}?>">
                <a href="<?= base_url('admin/feedback/'); ?>">
                    <i class="fas fa-comment"></i>
                    <p>Feedback Pengguna</p>
                </a>
            </li>
        </ul>
	</div>
</div>