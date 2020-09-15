<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg-10">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>Data Pembayaran
            <?php } ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="dropdown mb-3">
                <a class="dropdown-toggle btn btn-primary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Print Laporan
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Generate Laporan</div>
                    <a class="dropdown-item" href="#" onclick="window.open('<?= base_url('spp/printPembayaran/') ?>')">Print Hari Ini</a>
                    <a class="dropdown-item" href="#" onclick="window.open('<?= base_url('spp/printPembayaranBulan/') ?>')">Print Bulan Ini</a>
                    <a class="dropdown-item" href="#" onclick="window.open('<?= base_url('spp/printPembayaranTahunAjaran/') ?><?= $tahunAjaran['tahun_awal'] . '/' . $tahunAjaran['tahun_akhir']; ?>')">Print Tahun Ajaran <?= $tahunAjaran['tahun_awal'] . '/' . $tahunAjaran['tahun_awal']; ?></a>
                    <!-- <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="window.open('<?= base_url('inventaris/printBarang'); ?>')">Print Semua Data</a> -->
                </div>
            </div>
            <a href="<?= base_url(); ?>"></a>
            <table class="table table-hover dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Tahun Ajaran</th>
                        <th scope="col">Pembayaran Ke</th>
                        <th scope="col">Tanggal Bayar</th>
                        <th scope="col">Jumlah Bayar</th>
                        <th scope="col">Print Laporan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($pembayaran as $p) { ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $p['nis'] ?></td>
                            <td><?= $p['tahun_ajaran'] ?></td>
                            <td><?= $p['pembayaran_ke'] ?></td>
                            <td><?= $p['tanggal_bayar'] ?></td>
                            <td>Rp.<?= number_format($p['tagihan_bulanan'], '0', '.', '.'); ?></td>
                            <?php
                            $nis = $p['nis'];
                            $tanggalBayar = $p['tanggal_bayar'];
                            $pembayaranKe = $p['pembayaran_ke'];
                            ?>
                            <td><a href="<?= base_url("spp/printBayar?nis=$nis&tanggal=$tanggalBayar&pembayaranKe=$pembayaranKe"); ?>" target="_blank" class="badge badge-info">Print</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>