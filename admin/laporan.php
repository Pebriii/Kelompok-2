<?php
$title = 'laporan';
require 'functions.php';
require 'layout_header.php';
$bulan = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id WHERE status_bayar = 'dibayar' AND MONTH(tgl_pembayaran) = MONTH(NOW())");
$tahun = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id WHERE status_bayar = 'dibayar' AND YEAR(tgl_pembayaran) = YEAR(NOW())");
$minggu = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id WHERE status_bayar = 'dibayar' AND WEEK(tgl_pembayaran) = WEEK(NOW())");


$penjualan = ambildata($conn,"SELECT SUM(detail_transaksi.total_harga) AS total,COUNT(detail_transaksi.paket_id) as jumlah_paket,paket.nama_paket,transaksi.tgl_pembayaran FROM detail_transaksi
INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id
INNER JOIN paket ON paket.id_paket = detail_transaksi.paket_id
WHERE transaksi.status_bayar = 'dibayar' GROUP BY detail_transaksi.paket_id");
?>
<div class="container-fluid">
    <div class="row bg-title" style="background-color: #00bfff">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title" style="color: #000000;">Data Laporan</h4> </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- ============================================================== -->
    <!-- Different data widgets -->
    <!-- ============================================================== -->
    <!-- .row -->
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info" style="border-radius: 30px; background-color: #00bfff;">
                <h3 class="box-title" style="color: #000000;"><strong>Penghasilan Tahun Ini</strong></h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success" style="color: #000000;"><?= htmlspecialchars($tahun['total']); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info" style="border-radius: 30px; background-color: #00bfff;">
                <h3 class="box-title" style="color: #000000;"><strong>Penghasilan Bulan ini</strong></h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple" style="color: #000000;"><?= htmlspecialchars($bulan['total']); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info" style="border-radius: 30px; background-color: #00bfff;">
                <h3 class="box-title" style="color: #000000;"><strong>Penghasilan Minggu Ini</strong></h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info" style="color: #000000;"><?= htmlspecialchars($minggu['total']); ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box" style="border-radius: 30px; background-color: #00bfff;">
                <h3 class="box-title" style="color: #000000;">Laporan Penjualan Paket</h3>
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th style="color: #000000;">No</th>
                                <th style="color: #000000;">Nama Paket</th>
                                <th style="color: #000000;">Jumlah Transaksi</th>
                                <th style="color: #000000;">Tanggal Transaksi</th>
                                <th style="color: #000000;">Total Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($penjualan as $transaksi): ?>
                                <tr>
                                    <td style="color: #000000;"><?= $no++ ?></td>
                                    <td style="color: #000000;"><?= htmlspecialchars($transaksi['nama_paket']); ?></td>
                                    <td style="color: #000000;"><?= htmlspecialchars($transaksi['jumlah_paket']); ?></td>
                                    <td style="color: #000000;"><?= htmlspecialchars($transaksi['tgl_pembayaran']); ?></td>
                                    <td style="color: #000000;"><?= htmlspecialchars($transaksi['total']); ?></td>                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'layout_footer.php';
?> 
