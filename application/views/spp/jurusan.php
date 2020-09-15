<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php } ?>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#jurusanModal">Tambah Jurusan Baru</a>
            <table class="table table-hover dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Jurusan</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Tagihan Bulanan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($jurusan as $j) { ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $j['id'] ?></td>
                            <td><?= $j['nama'] ?></td>
                            <td>Rp <?= number_format($j['tagihan_bulanan'], '0', '.', '.') ?></td>
                            <td>
                                <a href="<?= base_url('spp/editJurusan/') . $j['id'] ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url('spp/hapusJurusan/') . $j['id'] ?>" class="badge badge-danger" onclick="return confirm('Hapus menu?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


</div>

</div>


<!-- Modal -->
<div class="modal fade" id="jurusanModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="JurusanModalLabel">Tambah Jurusan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Nama jurusan" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="tagihan_bulanan" name="tagihan_bulanan" placeholder="Tagihan Bulanan" required>
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