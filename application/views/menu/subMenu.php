<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#subMenuModal">Tambah Sub Menu</a>
            <table class="table table-hover dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sub Menu</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($subMenu as $sm) { ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $sm['judul'] ?></td>
                            <td><?= $sm['menu'] ?></td>
                            <td><?= $sm['url'] ?></td>
                            <td><?= $sm['icon'] ?></td>
                            <td>
                                <?php if ($sm['is_active'] == 1) {
                                    echo "active";
                                } else {
                                    echo "non-active";
                                } ?>
                            </td>
                            <td>
                                <a href="<?= base_url('menu/editSubMenu/') . $sm['id'] ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url('menu/hapusSubMenu/') . $sm['id'] ?>" class="badge badge-danger" onclick="return confirm('Hapus menu?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>


<!-- Modal -->
<div class="modal fade" id="subMenuModal" tabindex="-1" role="dialog" aria-labelledby="subMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subMenuModalLabel">Tambah sub Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Sub Menu">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Pilih Menu:</option>
                            <?php foreach ($menu as $m) { ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Sub menu URL">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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