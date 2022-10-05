<?php
$title = 'transaksi';
require 'functions.php';
require 'layout_header.php';
$query = "SELECT transaksi.*,member.nama_member , detail_transaksi.total_harga FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi ";
$data = ambildata($conn,$query);
?> 
<div class="container-fluid">
    <div class="row bg-title" style="background-color: #00bfff">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title" style="color: #000000;">Data <?= $title ?></h4> </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box" style="border-radius: 30px; background-color: #00bfff;"">
                <div class="row">
                    <div class="col-md-6">
                        <a href="transaksi_cari_member.php" style="background-color: #000000; border-color: #000000;" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                         <a href="transaksi_konfirmasi.php" style="background-color: #000000; border-color: #000000;" class="btn btn-primary box-title"><i class="fa fa-check fa-fw"></i> Konfirmasi Pembayaran</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" style="background-color: #000000; border-color: #000000;" class="btn btn-primary box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered thead-dark" id="table" style="border: 2px solid #000000;">
                        <thead class="thead-dark">
                            <tr>
                                <th style="color: #000000; border: 1px solid #000000;">No</th>
                                <th style="color: #000000; border: 1px solid #000000;">Invoice</th>
                                <th style="color: #000000; border: 1px solid #000000;">Member</th>
                                <th style="color: #000000; border: 1px solid #000000;">Status</th>
                                <th style="color: #000000; border: 1px solid #000000;">Pembayaran</th>
                                <th style="color: #000000; border: 1px solid #000000;">Total Harga</th>
                                <th width="15%" style="color: #000000; border: 1px solid #000000;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $transaksi): ?>
                                <tr>
                                    <td style="color: #000000; border: 1px solid #000000;"></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $transaksi['kode_invoice'] ?></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $transaksi['nama_member'] ?></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $transaksi['status'] ?></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $transaksi['status_bayar'] ?></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $transaksi['total_harga'] ?></td>
                                    <td align="center" style="color: #000000; border: 1px solid #000000;">
                                          <a href="transaksi_detail.php?id=<?= $transaksi['id_transaksi']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" style="background-color: #000000; border-color: #000000;" class="btn btn-success btn-block">Detail</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- table -->
    <!-- ============================================================== -->
    <div class="row">
        
    </div>
</div>
<?php
require'layout_footer.php';
