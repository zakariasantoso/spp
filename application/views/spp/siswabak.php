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
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#siswaModal">Tambah Siswa</a>
            <a href="<?= base_url('import'); ?>" class="btn btn-success">Import Excel</a>
            <form action="<?= base_url('spp/printFilter'); ?>" method="post" class="col-lg-8 row mt-3">
                <div class="form-group col">
                    <select class="custom-select" name="id_jurusan">
                        <option selected value="">Pilih jurusan:</option>
                        <?php foreach ($jurusan as $jurusan) { ?>
                            <option name="id_jurusan" id="jurusan" value="<?= $jurusan['id']; ?>"><?= $jurusan['nama']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col">
                    <select class="custom-select" name="kelas">
                        <option value="" selected>Pilih kelas:</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-secondary">Print</button>
                </div>
            </form>
            <a href="#" onclick="window.open('<?= base_url('excel/template.xlsx'); ?>')" class="d-flex justify-content-end">Download Template Excel</a>

            <table class="table table-hover dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($siswa as $s) { ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $s['nis'] ?></td>
                            <td><?= $s['nama'] ?></td>
                            <td><?= $s['kelas'] ?></td>
                            <td><?= $s['jurusan'] ?></td>
                            <td><?= $s['tanggal_lahir'] ?></td>
                            <td>
                                <a href="<?= base_url('spp/editSiswa/') . $s['id'] ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url('spp/hapusSiswa/') . $s['id'] ?>" class="badge badge-danger" onclick="return confirm('Anda yakin hapus siswa yg dipilih?')">Delete</a>
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
<div class="modal fade" id="siswaModal" tabindex="-1" role="dialog" aria-labelledby="siswaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="siswaModalLabel">Tambah siswa baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama siswa" required>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4 d-flex align-center">
                            <label for="tanggal">Tanggal lahir</label>
                        </div>
                        <div class="col-lg-8 row">
                            <div class="col">
                                <input type="number" class="form-control" id="tanggal" name="tanggal" placeholder="dd" required maxlength="2">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="bulan" name="bulan" placeholder="mm" required maxlength="2">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" id="tahun" name="tahun" placeholder="yyyy" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <select class="custom-select" name="id_jurusan">
                        <option selected value="">Pilih jurusan:</option>
                        <?php foreach ($jurusan as $jurusan) { ?>
                            <option name="id_jurusan" id="jurusan" value="<?= $jurusan['id']; ?>">
                            <?= $jurusan['nama']; ?>
                        </option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <select class="custom-select" name="kelas" required>
                                <option selected>Pilih kelas:</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <input type="number" class="form-control" id="nis" name="nis" placeholder="NIS siswa" required>
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