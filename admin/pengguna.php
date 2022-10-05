<?php
$title = 'pengguna';
require 'functions.php';
require 'layout_header.php';
$query = 'SELECT * FROM user order by role desc';
$data = ambildata($conn,$query);
?> 
<div class="container-fluid">
    <div class="row bg-title" style="background-color: #00bfff">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title" style="color: #000000;">Data Pengguna</h4> </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box" style="border-radius: 30px; background-color: #00bfff;">
                <div class="row">
                    <div class="col-md-6">
                        <a href="pengguna_tambah.php" style="background-color: #000000; border-color: #000000;" class="btn btn-primary box-title"><i class="fa fa-plus fa-fw"></i> Tambah</a>
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
                                <th style="color: #000000; border: 1px solid #000000;">Username</th>
                                <th style="color: #000000; border: 1px solid #000000;">Role</th>
                                <th width="15%" style="color: #000000; border: 1px solid #000000;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as $user): ?>
                                <tr>
                                    <td style="color: #000000; border: 1px solid #000000;"></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $user['nama_user'] ?></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $user['username'] ?></td>
                                    <td style="color: #000000; border: 1px solid #000000;"><?= $user['role'] ?></td>
                                    <td align="center" style="color: #000000; border: 1px solid #000000;">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                          <a href="pengguna_edit.php?id=<?= $user['id_user']; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit" style="background-color: #000000; border-color: #000000;" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                          <a href="pengguna_hapus.php?id=<?= $user['id_user']; ?>" onclick="return confirm('Yakin hapus data ? ');" data-toggle="tooltip" data-placement="bottom" title="Hapus" style="background-color: #000000; border-color: #000000;" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
