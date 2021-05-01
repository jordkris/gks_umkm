<div class="content">
    <!-- Tab panes -->
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="feedback">
        <!-- Tabs content -->
        <!-- <div class="container-fluid"> -->
            <br />
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="header">
                                    <h4 class="title">Daftar Feedback Pengguna</h4>
                                </div>
                            </div>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Feedback</th>
                                    <th class="text-center">Kontak</th>
                                </thead>
                                <tbody class="text-center">
                                    <?php if($feedback_count == 0) { ?>
                                        <div class="alert alert-info col-md-12" role="alert"><i class="fas fa-exclamation-circle"></i> Tidak ada feedback pengguna tersimpan.<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button></div>
                                    <?php } $i=1; foreach($feedback as $f) {  ?>
                                    <tr>
                                        <td style="width: 10px;"><?= $i; ?></td>
                                        <td><?= $f['name']; ?></td>
                                        <td><?= $f['main']; ?></td>
                                        <td><?= $f['contact']; ?></td>
                                    </tr>
                                    <?php $i++;} ?>
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