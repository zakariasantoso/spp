<!-- Begin Page Content -->
<div class="container my-5">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Bukti Pembayaran SPP</h1>

    <div class="card">
        <h5 class="card-header">Data Siswa</h5>
        <div class="card-body">
            <table class="mb-3">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $siswa['nama']; ?></td>
                </tr>
                <tr>
                    <td>Nis</td>
                    <td>:</td>
                    <td><?= $siswa['nis']; ?></td>
                </tr>
                <tr>
                    <td>Kelas </td>
                    <td>:</td>
                    <td><?= $siswa['kelas']; ?></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>:</td>
                    <td><?= $siswa['jurusan']; ?></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <table cellpadding="6" cellspacing="4" class="mt-4">
                <tr>
                    <td>Operator</td>
                    <td>:</td>
                    <td><?= $user['nama']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Bayar</td>
                    <td>:</td>
                    <td><?= $this->input->get('tanggal'); ?></td>
                </tr>
                <tr>
                    <td>Pembayaran ke-</td>
                    <td>:</td>
                    <td><?= $this->input->get('pembayaranKe'); ?></td>
                </tr>
                <tr>
                    <td>Nominal</td>
                    <td>:</td>
                    <td>Rp.<?= number_format($siswa['tagihan'], '0', '.', '.') ?></td>
                </tr>
            </table>
        </div>
        <div class="col-lg-5 d-flex justify-content-lg-center mt-5">
            <table cellspacing="3" cellpadding="4">
                <tr>
                    <td class="text-center">Operator Aplikasi Pengelolaan Data SPP</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td class="text-center"><?= $user['nama']; ?></td>
                </tr>
            </table>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>

<script>
    window.print();
</script>