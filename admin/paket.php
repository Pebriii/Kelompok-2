<?php
$title = 'paket';
require 'functions.php';
require 'layout_header.php';
$query = 'SELECT outlet.nama_outlet ,paket.* FROM paket INNER JOIN outlet ON paket.outlet_id = outlet.id_outlet';
$data = ambildata($conn,$query);
?> 
<div class="container-fluid">
    <div class="row bg-title" style="background-color: #00bfff">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title" style="color: #000000;">Data <?= htmlspecialchars($title); ?></h4> </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box" style="border-radius: 30px; background-color: #00bfff;">
                <div class="row">
                    <div class="col-md-6">
                        <a href="paket_tambah.php" style="background-color: #000000; border-color: #000000;" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
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
                                <th style="color: #000000; border: 1px solid #000000;">Nama Paket</th>
                                <th style="color: #000000; border: 1px solid #000000;">Jenis</th>
                                <th style="color: #000000; border: 1px solid #000000;">Harga</th>
                                <th style="color: #000000; border: 1px solid #000000;">Outlet</th>
                                <th width="15%" style="color: #000000; border: 1px solid #000000;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $paket): ?>
                                <tr>
                                    <td style="color: #000000; border: 1px solid #000000;"></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= htmlspecialchars($paket['nama_paket']); ?></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= htmlspecialchars($paket['jenis_paket']); ?></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= htmlspecialchars($paket['harga']); ?></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= htmlspecialchars($paket['nama_outlet']); ?></td>
                                    <td align="center" style="color: #000000; border: 1px solid #000000;">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                          <a href="paket_edit.php?id=<?= htmlspecialchars($paket['id_paket']); ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" style="background-color: #000000; border-color: #000000;" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                          <a href="paket_hapus.php?id=<?= htmlspecialchars($paket['id_paket']); ?>" onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip" data-placement="bottom" title="Hapus" style="background-color: #000000; border-color: #000000;" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </div>
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
