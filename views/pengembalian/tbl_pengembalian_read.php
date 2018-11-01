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
        <h2 style="margin-top:0px">Tbl_pengembalian Read</h2>
        <table class="table">
	    <tr><td>No Form Pengembalian</td><td><?php echo $no_form_pengembalian; ?></td></tr>
	    <tr><td>Nama Barang Balik</td><td><?php echo $nama_barang_balik; ?></td></tr>
	    <tr><td>Kondisi Barang</td><td><?php echo $kondisi_barang; ?></td></tr>
	    <tr><td>Keterangan Barang</td><td><?php echo $keterangan_barang; ?></td></tr>
	    <tr><td>Tanggal Balik</td><td><?php echo $tanggal_balik; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pengembalian') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>