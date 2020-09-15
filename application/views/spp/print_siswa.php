<!-- Begin Page Content -->
<div class="container my-5">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data siswa SMK Negeri 1 Percut Sei Tuan</h1>

    <div class="row">
        <div class="col-lg">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Jurusan</th>
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
                            <td><?= $s['tanggal_lahir'] ?></td>
                            <td><?= $s['jurusan'] ?></td>
                            
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