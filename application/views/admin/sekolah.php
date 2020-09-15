<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <?= $this->session->flashdata('message'); ?>

    <div class="row mt-4">
        <div class="col-lg-8 mt-4">
            <form action="" method="post" enctype="multipart/form-data" class="mt-4">
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="nama">Nama Sekolah</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama sekolah" value="<?= $sekolah['nama']; ?>">
                        <?php echo form_error('gambar', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="gambar">Gambar</label>
                    </div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/profile/') . $sekolah['logo'] ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="gambar">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <?php echo form_error('gambar', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->