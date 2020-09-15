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
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tahun Ajaran</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($tahunAjaran as $ta) { ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $ta['tahun_awal'] ?>/<?= $ta['tahun_akhir'] ?></td>
                            <td>
                                <a href="<?= base_url('spp/editTahunAjaran/') . $ta['id'] ?>" class="badge badge-success">Ubah</a>
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