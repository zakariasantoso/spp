<!-- Begin Page Content -->
<div class="container-fluid my-5">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jurusan</th>
                        <?php 
                            for ($i=1; $i <= 12; $i++) { ?> 
                                <th scope="col">ke <?= $i; ?></th>
                           <?php } ?>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($spp as $s) { ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $s['nis'] ?></td>
                            <td><?= $s['nama_siswa'] ?></td>
                            <td><?= $s['kelas'] ?></td>
                            <td><?= $s['nama'] ?></td>
                            <?php for ($j = 1; $j <= 12; $j++) { ?>
                                <td>
                                    <div class="row ml-2">
                                        <div class="col ml-2">

                                            <?php 
                                $sppSiswa = $this->db->get_where('spp', [
                                    'nis' => $s['nis'],
                                    'pembayaran_ke' => $j
                                    ])->row_array();
                                    if ($sppSiswa) { ?>
                                    <input type="checkbox" class="form-check-input" checked disabled />
                                    <?php } else { ?>
                                        <input type="checkbox" class="form-check-input" disabled />
                                    <?php } ?>
                                    </div>
                                </div>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>

<script>
    window.print();
</script>