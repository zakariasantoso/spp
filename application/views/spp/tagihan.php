<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1> -->
    <div class="row">
        <div class="col-lg-10 d-flex justify-content-center flex-column">
            <?= $this->session->flashdata('message'); ?>
            <form action="" method="get" class="col-lg-10">
                <div class="input-group mb-3 col-lg-10">
                    <input type="text" class="form-control" placeholder="Input NIS (Nomor Induk Siswa)" aria-label="nis" aria-describedby="button-addon2" name="nis" value="<?= $this->input->get('nis'); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>

            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php } ?>

            <?php if ($this->input->get('nis')) { ?>
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
                                <th scope="col">Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                <form action="" method="post">
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
                                                <div class="col-lg-5">
                                                    <label for="<?= $i; ?>">Sudah dibayar?</label>
                                                </div>
                                                <div class="col-lg-2">
                                                    <?php if ($sudahBayar) { ?>
                                                        <input type="checkbox" class="form-check-input" id="<?= $i; ?>" name="ke<?= $i; ?>" value="<?= $i; ?>" checked disabled>

                                                        <?php $sudahBayar = false; ?>
                                                    <?php } else { ?>
                                                        <input type="checkbox" class="form-check-input" id="<?= $i; ?>" name="ke<?= $i; ?>" value="<?= $i; ?>">
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td></td>
                                    <td class="d-flex justify-content-end">
                                        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#sppModal">Simpan</a>

                                    </td>
                                </tr>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div class="alert alert-danger col-lg-10" role="alert">
                        Data siswa dengan nis <?= htmlspecialchars($this->input->get('nis')); ?> tidak ditemukan
                    </div>
                <?php } ?>
            <?php } ?>





        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="sppModal" tabindex="-1" role="dialog" aria-labelledby="sppModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sppModalLabel">Verifikasi pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password anda">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>