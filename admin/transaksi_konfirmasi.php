<?php
$title = 'transaksi';
require 'functions.php';
require 'layout_header.php';
$query = "SELECT transaksi.*,member.nama_member , detail_transaksi.total_harga FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi WHERE transaksi.status_bayar='belum'";
$data = ambildata($conn,$query);
?> 
<div class="container-fluid">
    <div class="row bg-title" style="background-color: #00bfff;">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Data <?= $title ?></h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="transaksi.php">Transaksi</a></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box" style="border-radius: 30px; background-color: #00bfff;">
                <div class="row">
                    <div class="col-md-6">
                        <a href="javascript:void(0)" style="background-color: #000000; border-color: #000000;" onclick="window.history.back();" class="btn btn-primary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
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
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $transaksi['total_harga'] ?></td>
                                    <td align="center" style="color: #000000; border: 1px solid #000000;">
                                          <a href="transaksi_bayar.php?id=<?= $transaksi['id_transaksi']; ?>" data-toggle="tooltip" data-placement="bottom" title="Pilih" style="background-color: #000000; border-color: #000000;" class="btn btn-primary btn-block">Pilih</a>
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
