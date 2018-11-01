<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA JENIS BARANG</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered'>        

	    <tr><td width='200'>Jenis Barang Kode <?php echo form_error('jenis_barang_kode') ?></td><td><input type="text" class="form-control" name="jenis_barang_kode" id="jenis_barang_kode" placeholder="Jenis Barang Kode" value="<?php echo $jenis_barang_kode; ?>" /></td></tr>
	    <tr><td width='200'>Kode Jenis Barang <?php echo form_error('kode_jenis_barang') ?></td><td><input type="text" class="form-control" name="kode_jenis_barang" id="kode_jenis_barang" placeholder="Kode Jenis Barang" value="<?php echo $kode_jenis_barang; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_jenis_barang" value="<?php echo $id_jenis_barang; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('jenis_barang') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>