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
        <h2 style="margin-top:0px">Tbl_lokasi_barang Read</h2>
        <table class="table">
	    <tr><td>Lokasi Barang Simpan</td><td><?php echo $lokasi_barang_simpan; ?></td></tr>
	    <tr><td>Kode Lokasi</td><td><?php echo $kode_lokasi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('lokasi_barang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>