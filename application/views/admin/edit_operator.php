<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <form action="" method="post" class="col-lg-6">
        <div class="form-group">
            <label for="judul">Nama operator</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama operator" value="<?= $operator['nama'] ?>">
            <?php echo form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
        </div>
        <div class="form-group">
            <label for="url">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email operator" value="<?= $operator['email'] ?>">
            <?php echo form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
        </div>
        <div class="modal-footer">
            <a href="<?= base_url('admin/operator') ?>" class="btn btn-secondary" data-dismiss="modal">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>


</div>
<!-- /.container-fluid -->

</div>