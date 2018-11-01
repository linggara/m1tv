<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tbl_peminjaman Read</h2>
        <table class="table">
	    <tr><td>No Form Peminjaman</td><td><?php echo $no_form_peminjaman; ?></td></tr>
	    <tr><td>Id Form Barang</td><td><?php echo $id_form_barang; ?></td></tr>
	    <tr><td>User Peminjaman</td><td><?php echo $user_peminjaman; ?></td></tr>
	    <tr><td>Nama Program</td><td><?php echo $nama_program; ?></td></tr>
	    <tr><td>Tgl Peminjaman</td><td><?php echo $tgl_peminjaman; ?></td></tr>
	    <tr><td>Tgl Pengembalian</td><td><?php echo $tgl_pengembalian; ?></td></tr>
	    <tr><td>Status Peminjaman</td><td><?php echo $status_peminjaman; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('peminjaman') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>