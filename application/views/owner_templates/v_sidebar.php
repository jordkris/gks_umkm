<div class="wrapper">
<div class="sidebar" data-color="blue" data-image="<?= base_url('assets/');?>img/sidebar-5.jpg">

<!--

    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
    Tip 2: you can also add an image using data-image tag

-->

	<div class="sidebar-wrapper">
        <div class="logo">
            <a href="<?= base_url('owner');?>" class="simple-text">
                <img src="<?= base_url('assets/');?>img/logo/Logo GKS.png" style="width: 100%; height:100%;">
            </a>
        </div>

        <ul class="nav">
            <li class="<?php if($title == 'Profil Pengguna') { echo 'active';}?>">
                <a href="<?= base_url('owner/profile'); ?>">
                    <i class="pe-7s-user"></i>
                    <p>Profil Pengguna</p>
                </a>
            </li>
            <li class="<?php if($title == 'Kelola Produk') { echo 'active';}?>">
                <a href="<?= base_url('owner/product/1'); ?>">
                    <i class="fas fa-tasks"></i>
                    <p>Kelola Produk</p>
                </a>
            </li>
            <li class="<?php if($title == 'Ubah Password') { echo 'active';}?>">
                <a href="<?= base_url('owner/password/'); ?>">
                    <i class="fas fa-key"></i>
                    <p>Ubah Password</p>
                </a>
            </li>
        </ul>
	</div>
</div>