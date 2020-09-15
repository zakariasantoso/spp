<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <form action="" method="post" class="col-lg-6">
        <div class="form-group">
            <input type="text" class="form-control" id="role" name="role" placeholder="Nama Role" value="<?= $role['role'] ?>">
            <?php echo form_error('role', '<small class="text-danger pl-3">', '</small>') ?>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>

</div>
<!-- /.container-fluid -->

</div>