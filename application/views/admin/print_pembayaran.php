<!-- Begin Page Content -->
<div class="container my-5">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Tahun Ajaran</th>
                        <th scope="col">Pembayaran ke</th>
                        <th scope="col">Tanggal bayar</th>
                        <th scope="col">Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    $totalUang = 0;
                    ?>
                    <?php foreach ($spp as $s) { ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $s['nis'] ?></td>
                            <td><?= $s['tahun_ajaran'] ?></td>
                            <td><?= $s['pembayaran_ke'] ?></td>
                            <td><?= $s['tanggal_bayar'] ?></td>
                            <td>Rp.<?= number_format($s['tagihan_bulanan'], '0', '.', '.'); ?></td>
                            <?php
                            $totalUang += $s['tagihan_bulanan'];
                            ?>
                        </tr>
                    <?php } ?>
                    <tr class="table-danger">
                        <th scope="row">Jumlah Uang Masuk :</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Rp.<?= number_format($totalUang, '0', '.', '.'); ?></td>

                    </tr>
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