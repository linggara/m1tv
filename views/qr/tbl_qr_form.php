<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_QR</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Qr Id Barang <?php echo form_error('qr_id_barang') ?></td><td><input type="text" class="form-control" name="qr_id_barang" id="qr_id_barang" placeholder="Qr Id Barang" value="<?php echo $qr_id_barang; ?>" /></td></tr>
	    <tr><td width='200'>Qr <?php echo form_error('qr') ?></td><td><input type="text" class="form-control" name="qr" id="qr" placeholder="Qr" value="<?php echo $qr; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_qr" value="<?php echo $id_qr; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('qr') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>