<!-- Main Container -->

    <div class="row container-kamn">
        <img id="logo_gks_umkm" class="preview_img blog-post" src="<?= base_url('assets/img/logo/Logo GKS 4.jpg');?>" alt="logo_gks_umkm" width="100%" onclick="view_image('logo_gks_umkm')"/> 
    </div>

    <div id="banners"></div>
    <div class="container">   
        <div class="row">
            <div class="col-md-3" style="background-color: #8FBC8F;height: 253px;">
                <h3 class="lead" style="text-align: center;font-family: cursive;"><b><?= $about['left_title']; ?></b></h3><hr>
                <p class="text-justify" style="font-family: cursive;"><?= nl2br(str_replace('', ' ', htmlspecialchars($about['left_main']))); ?></p>
            </div>
            <div class="col-md-9">
                <h3 class="lead" style="text-align: center;font-family: cursive;"><b><?= $about['right_title']; ?></b></h3><hr>
                <p class="text-justify" style="font-family: cursive;"><?= nl2br(str_replace('', ' ', htmlspecialchars($about['right_main']))); ?></p>
                <p class="text-justify" style="font-family: cursive;">Daftar Nominatif Pengurus Forum Gerai Kopi dan Mi Kelurahan Tembalang, Semarang :</p>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Jabatan</th>
                    </tr>
                    <tr>
                        <td class="text-center">1</td>
                        <td>Maryono (Lurah Tembalang)</td>
                        <td>Pembina</td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>Weni S Wijaya, S.Sos., M.Pd. (Seklur Tembalang)</td>
                        <td>Penanggung Jawab</td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td>Kasmiran</td>
                        <td>Ketua</td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td>Piliani Ernawati</td>
                        <td>Sekretaris 1</td>
                    </tr>
                    <tr>
                        <td class="text-center">5</td>
                        <td>Anissa Eka Sari (Kasi Kessos)</td>
                        <td>Sekretaris 2</td>
                    </tr>
                    <tr>
                        <td class="text-center">6</td>
                        <td>Jumiyati</td>
                        <td>Bendahara 1</td>
                    </tr>
                    <tr>
                        <td class="text-center">7</td>
                        <td>Sumini</td>
                        <td>Bendahara 2</td>
                    </tr>
                    <tr>
                        <td class="text-center">8</td>
                        <td>Any Adel Geraldus</td>
                        <td>Bidang Organisasi dan Hukum</td>
                    </tr>
                    <tr>
                        <td class="text-center">9</td>
                        <td>Umi Isnaini</td>
                        <td>Bidang Pemasaran</td>
                    </tr>
                    <tr>
                        <td class="text-center">10</td>
                        <td>Joko Rahmantoko</td>
                        <td>Bidang Litbang dan Teknologi</td>
                    </tr>
                    <tr>
                        <td class="text-center">11</td>
                        <td>Rina K</td>
                        <td>Bidang Diklat</td>
                    </tr>
                    <tr>
                        <td class="text-center">12</td>
                        <td>Lusi Riani Pujiyanti, S.Pt.</td>
                        <td>Bidang Permodalan</td>
                    </tr>
                </table>
            </div>  
        </div>    
    </div>  

    <!--End Main Container -->