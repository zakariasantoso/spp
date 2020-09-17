<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <form action="" method="post" class="col-lg-9">
        <div class="form-group row">
            <div class="col-lg-2">
                <label for="nama">Nama :</label>
            </div>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama siswa" value="<?= $siswa['nama']; ?>" required>
            </div>
            <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

                    <div class="form-group row">
                        <div class="col-lg-4 d-flex align-center">
                            <label for="tanggal">Tanggal lahir</label>
                        </div>
                        <div class="col-lg-8 row">
                            <div class="col">
                                <input type="number" class="form-control" id="tanggal" name="tanggal" placeholder="dd" required min="0" max="31">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="bulan" name="bulan" placeholder="mm" required min="0" max="12">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="tahun" name="tahun" placeholder="yyyy" required min="0">
                            </div>
                        </div>
                    </div>



        <div class="form-group row">
            <div class="col-lg-2">
                <label for="id_jurusan">Jurusan :</label>
            </div>
            <div class="col-lg-10">
                <select class="custom-select" name="id_jurusan">
                    <?php foreach ($jurusan as $j) { ?>
                        <?php if ($j['id'] == $siswa['id_jurusan']) { ?>
                            <option name="id_jurusan" id="id_jurusan" value="<?= $j['id']; ?>" selected><?= $j['nama']; ?></option>
                        <?php } else { ?>
                            <option name="id_jurusan" id="jurusan" value="<?= $j['id']; ?>"><?= $j['nama']; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <?php echo form_error('id_jurusan', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-2">
                <label for="kelas">Kelas:</label>
            </div>
            <div class="col-lg-10">
                <select class="custom-select" name="kelas">
                    <option selected>Pilih kelas:</option>
                    <?php foreach ($kelas as $k) { ?>
                        <?php if ($k == $siswa['kelas']) { ?>
                            <option name="kelas" id="jurusan" value="<?= $k; ?>" selected><?= $k; ?></option>
                        <?php } else { ?>
                            <option name="kelas" id="jurusan" value="<?= $k; ?>"><?= $k; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <?php echo form_error('kelas', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-2">
                <label for="nis">NIS :</label>
            </div>
            <div class="col-lg-10">
                <input type="number" class="form-control" id="nis" name="nis" placeholder="NIS siswa" value="<?= $siswa['nis']; ?>" required>
                <?php echo form_error('nis', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
        </div>
        <div class="modal-footer">
            <a href="<?= base_url('spp/siswa'); ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>


</div>
<!-- /.container-fluid -->

</div>