<?php
$title = 'pelanggan';
require 'functions.php';
require 'layout_header.php';
$query = 'SELECT * FROM member';
$data = ambildata($conn,$query);
?> 
<div class="container-fluid">
    <div class="row bg-title" style="background-color: #00bfff">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title" style="color: #000000;">Data Pelanggan</h4> </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box" style="border-radius: 30px; background-color: #00bfff;">
                <div class="row">
                    <div class="col-md-6">
                        <a href="pelanggan_tambah.php" style="background-color: #000000; border-color: #000000;" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" style="background-color: #000000; border-color: #000000;" class="btn btn-primary box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered thead-dark" id="table" style="border: 2px solid #000000;">
                        <thead class="thead-dark">
                            <tr>
                                <th width="5%" style="color: #000000; border: 1px solid #000000;">No</th>
                                <th style="color: #000000; border: 1px solid #000000;">Nama</th>
                                <th style="color: #000000; border: 1px solid #000000;">Alamat</th>
                                <th style="color: #000000; border: 1px solid #000000;">JK</th>
                                <th style="color: #000000; border: 1px solid #000000;">Telepon</th>
                                <th style="color: #000000; border: 1px solid #000000;">No KTP</th>
                                <th width="15%" style="color: #000000; border: 1px solid #000000;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $member): ?>
                                <tr>
                                    <td style="color: #000000; border: 1px solid #000000;"></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $member['nama_member'] ?></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $member['alamat_member'] ?></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $member['jenis_kelamin'] ?></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $member['telp_member'] ?></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $member['no_ktp'] ?></td>
                                    <td align="center" style="color: #000000; border: 1px solid #000000;">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                          <a href="pelanggan_edit.php?id=<?= $member['id_member']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" style="background-color: #000000; border-color: #000000;" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                          <a href="#" data-toggle="tooltip" data-placement="bottom" title="Detail" style="background-color: #000000; border-color: #000000;" class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                          <a href="pelanggan_hapus.php?id=<?= $member['id_member']; ?>" onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip" data-placement="bottom" title="Hapus" style="background-color: #000000; border-color: #000000;" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
