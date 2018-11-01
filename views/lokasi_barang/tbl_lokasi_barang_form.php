<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA LOKASI BARANG</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered'>        

	    <tr><td width='200'>Lokasi Barang Simpan <?php echo form_error('lokasi_barang_simpan') ?></td><td><input type="text" class="form-control" name="lokasi_barang_simpan" id="lokasi_barang_simpan" placeholder="Lokasi Barang Simpan" value="<?php echo $lokasi_barang_simpan; ?>" /></td></tr>
	    <tr><td width='200'>Kode Lokasi <?php echo form_error('kode_lokasi') ?></td><td><input type="text" class="form-control" name="kode_lokasi" id="kode_lokasi" placeholder="Kode Lokasi" value="<?php echo $kode_lokasi; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_lokasi_barang" value="<?php echo $id_lokasi_barang; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('lokasi_barang') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>