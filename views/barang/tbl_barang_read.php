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
        <h2 style="margin-top:0px">Tbl_barang Read</h2>
        <table class="table">
	    <tr><td>Group Barang</td><td><?php echo $group_barang; ?></td></tr>
	    <tr><td>Jenis Barang</td><td><?php echo $jenis_barang; ?></td></tr>
	    <tr><td>Merk Barang</td><td><?php echo $merk_barang; ?></td></tr>
	    <tr><td>Type Barang</td><td><?php echo $type_barang; ?></td></tr>
	    <tr><td>Uraian Barang</td><td><?php echo $uraian_barang; ?></td></tr>
	    <tr><td>Barcode Barang</td><td><?php echo $barcode_barang; ?></td></tr>
	    <tr><td>Barcode Barang Detail</td><td><?php echo $barcode_barang_detail; ?></td></tr>
	    <tr><td>Serial Number</td><td><?php echo $serial_number; ?></td></tr>
	    <tr><td>Lokasi Barang</td><td><?php echo $lokasi_barang; ?></td></tr>
	    <tr><td>Aset Barang</td><td><?php echo $aset_barang; ?></td></tr>
	    <tr><td>Tag Form Pinjam</td><td><?php echo $tag_form_pinjam; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>