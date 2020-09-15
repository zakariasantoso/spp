<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <div class="col">
                            <label for="tahun_ajaran">Tahun ajaran : </label>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" id="tahun_awal" name="tahun_awal" placeholder="Tahun awal" value="<?= $tahunAjaran["tahun_awal"]; ?>">

                        </div>
                        <h3>/</h3>
                        <div class="col">
                            <input type="number" class="form-control" id="tahun_akhir" name="tahun_akhir" placeholder="Tahun akhir" value="<?= $tahunAjaran["tahun_akhir"]; ?>">

                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('spp/tahunAjaran'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>