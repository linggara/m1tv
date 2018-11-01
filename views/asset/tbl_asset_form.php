<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA ASSET</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered'>        

	    <tr><td width='200'>Asset <?php echo form_error('asset') ?></td><td><input type="text" class="form-control" name="asset" id="asset" placeholder="Asset" value="<?php echo $asset; ?>" /></td></tr>
	    <tr><td width='200'>Kode Asset <?php echo form_error('kode_asset') ?></td><td><input type="text" class="form-control" name="kode_asset" id="kode_asset" placeholder="Kode Asset" value="<?php echo $kode_asset; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_asset" value="<?php echo $id_asset; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('asset') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>