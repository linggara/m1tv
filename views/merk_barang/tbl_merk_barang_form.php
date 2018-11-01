<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA MERK BARANG</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered'>        

	    <tr><td width='200'>Merk Barang Kode <?php echo form_error('merk_barang_kode') ?></td><td><input type="text" class="form-control" name="merk_barang_kode" id="merk_barang_kode" placeholder="Merk Barang Kode" value="<?php echo $merk_barang_kode; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_merk_barang" value="<?php echo $id_merk_barang; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('merk_barang') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>