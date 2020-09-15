<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <form action="" method="post" class="col-lg-9">
        <div class="form-group row">
            <div class="col-lg-8">
                <input type="text" class="form-control" id="nis" name="nama" placeholder="Nama siswa" value="<?= $jurusan['nama']; ?>" required>
                <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
            <div class="col-lg-4">
                <input type="number" class="form-control" id="tagihan_bulanan" name="tagihan_bulanan" placeholder="Tagihan Bulanan" value="<?= $jurusan['tagihan_bulanan']; ?>" required>
                <?php echo form_error('tagihan_bulanan', '<small class="text-danger pl-3">', '</small>') ?>
            </div>
        </div>
        <div class="modal-footer">
            <a href="<?= base_url('spp/jurusan'); ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>


</div>
<!-- /.container-fluid -->

</div>