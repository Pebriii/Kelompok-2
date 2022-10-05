<?php
$title = 'dashboard';
require 'functions.php';
require 'layout_header.php';
$jTransaksi = ambilsatubaris($conn,'SELECT COUNT(id_transaksi) as jumlahtransaksi FROM transaksi');
$jPelanggan = ambilsatubaris($conn,'SELECT COUNT(id_member) as jumlahmember FROM member');
$joutlet = ambilsatubaris($conn,'SELECT COUNT(id_outlet) as jumlahoutlet FROM outlet');
$query = "SELECT transaksi.*,member.nama_member , detail_transaksi.total_harga FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi   ORDER BY transaksi.id_transaksi DESC LIMIT 10";
$data = ambildata($conn,$query);
?> 
<div class="container-fluid">
    <div class="row bg-title" style="background-color: #00bfff;">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title" style="color: #000000;">Dashboard</h4> </div>
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
                <h3 class="box-title"><strong style="color: #000000;">Oulet</strong></h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success" style="color: #000000;"><?= htmlspecialchars($joutlet['jumlahoutlet']); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info" style="border-radius: 30px; background-color: #00bfff;">
                <h3 class="box-title"><strong style="color: #000000;">Pelanggan</strong></h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple" style="color: #000000;"><?= htmlspecialchars($jPelanggan['jumlahmember']); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info" style="border-radius: 30px; background-color: #00bfff;">
                <h3 class="box-title"><strong style="color: #000000;">Transaksi</strong></h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info" style="color: #000000;"><?= htmlspecialchars($jTransaksi['jumlahtransaksi']); ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box" style="border-radius: 30px; background-color: #00bfff;">
                <h3 class="box-title" style="color: #000000;">10 Transaksi Terbaru</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="color: #000000;">No</th>
                                <th style="color: #000000;">Invoice</th>
                                <th style="color: #000000;">Member</th>
                                <th style="color: #000000;">Status</th>
                                <th style="color: #000000;">Pembayaran</th>
                                <th style="color: #000000;">Total Harga</th>
                                <th width="15%" style="color: #000000;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($data as $transaksi): ?>
                                <tr>
                                    <td style="color: #000000;"><?= $no++ ?></td>
                                    <td style="color: #000000;"><?= htmlspecialchars($transaksi['kode_invoice']); ?></td>
                                    <td style="color: #000000;"><?= htmlspecialchars($transaksi['nama_member']); ?></td>
                                    <td style="color: #000000;"><?= htmlspecialchars($transaksi['status']); ?></td>
                                    <td style="color: #000000;"><?= htmlspecialchars($transaksi['status_bayar']); ?></td>
                                    <td style="color: #000000;"><?= htmlspecialchars($transaksi['total_harga']); ?></td>
                                    <td align="center">
                                          <a href="transaksi_detail.php?id=<?= htmlspecialchars($transaksi['id_transaksi']); ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" style="background-color: #000000; border-color: #000000;"class="btn btn-success btn-block">Detail</a>
                                    </td>
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
