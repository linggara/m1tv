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
        <h2 style="margin-top:0px">Tbl_merk_barang Read</h2>
        <table class="table">
	    <tr><td>Merk Barang Kode</td><td><?php echo $merk_barang_kode; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('merk_barang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>