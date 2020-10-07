<div id="content-wrapper" class="d-flex flex-column">
    <div class="d-flex justify-content-end my-1 mx-1">
       
    </div>
    <!-- Main Content -->
    <div id="content">


        <!-- Begin Page Content -->
        <div class="container mt-5">


            <div class="col d-flex justify-content-center align-items-center my-5">
                <img src="<?= base_url('assets/img/profile/' . $sekolah['logo']); ?>" alt="Logo" style="max-width: 30%;">
            </div>
            <div class="row mt-5">
                <div class="col d-flex justify-content-center flex-column">
                <div class="row">
                    <div class="col d-flex justify-content-center mb-3">
                    <a href="<?= base_url('auth'); ?>" class="btn btn-primary">Login</a>
                    </div>
                </div>

                    <!-- <h3>Silahkan Masukkan Peserta Didik.</h3>
                    <?= $this->session->flashdata('message'); ?>
                    <form action="" method="post" class="col mt-3 row">
                        <div class="input-group mb-3 col-lg-6">
                            <input type="text" class="form-control mb-4" placeholder="Input NIS (Nomor Induk Siswa)" aria-label="nis" aria-describedby="button-addon2" name="nis" value="<?= $nis; ?>">
                            <?php echo form_error('nis', '<small class="text-danger pl-3">', '</small>') ?>

                        </div>

                        <div class="col-lg-6">
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label for="tanggal">Tanggal lahir</label>
                                </div>
                                <div class="col-lg-7 row">
                                    <div class="col">
                                        <input type="number" class="form-control" id="tanggal" name="tanggal" placeholder="dd" min="0" max="31" required maxlength="2" >
                                        <?php echo form_error('tanggal', '<small class="text-danger pl-4">', '</small>') ?>

                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" id="bulan" name="bulan" placeholder="mm" min="0" max="12" required maxlength="2">
                                        <?php echo form_error('bulan', '<small class="text-danger pl-4">', '</small>') ?>
                                    </div>
                                    
                                    <div class="col">
                                        <input type="number" class="form-control mx-sm-3 mb-2 " id="tahun" name="tahun" placeholder="yyyy" min="0" required maxlength="4">
                                        <?php echo form_error('tahun', '<small class="text-danger pl-4">', '</small>') ?>

                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" name="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </div>
                    </form> -->

                    <?php if ($siswa) { ?>
                        <div class="card">
                            <h5 class="card-header">Data Siswa</h5>
                            <div class="card-body">
                                <table class="mb-3">
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?= $siswa['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nis</td>
                                        <td>:</td>
                                        <td><?= $siswa['nis']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kelas </td>
                                        <td>:</td>
                                        <td><?= $siswa['kelas']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jurusan</td>
                                        <td>:</td>
                                        <td><?= $siswa['jurusan']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <h5 class="my-3 ml-5">Pembayaran SPP tahun ajaran <?= $tahunAjaran["tahun_awal"]; ?>/<?= $tahunAjaran["tahun_akhir"]; ?></h5>

                        <table class="table table-hover col-lg-10 mx-auto">
                            <thead>
                                <tr>
                                    <th scope="col">Pembayaran ke</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 1; $i <= 12; $i++) { ?>
                                    <tr>
                                        <th scope="row"><label for="<?= $i ?>"><?= $i ?></label></th>
                                        <td>
                                            <div class="form-group row">
                                                <?php $sudahBayar = false; ?>
                                                <?php foreach ($spp as $s) {
                                                    if ($s['pembayaran_ke'] == $i) {
                                                        $sudahBayar = true;
                                                    }
                                                } ?>
                                                <?php if ($sudahBayar) { ?>
                                                    <p class="badge badge-success">Lunas</p>

                                                    <?php $sudahBayar = false; ?>
                                                <?php } else { ?>
                                                    <p class="badge badge-danger">Belum lunas</p>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>


                    <?php } ?>





                </div>
            </div>

            <!-- /.container -->
        </div>

        <!-- End of Main Content -->