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
        <h2 style="margin-top:0px">Tbl_jenis_barang Read</h2>
        <table class="table">
	    <tr><td>Jenis Barang Kode</td><td><?php echo $jenis_barang_kode; ?></td></tr>
	    <tr><td>Kode Jenis Barang</td><td><?php echo $kode_jenis_barang; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenis_barang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>