<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA DEPARTMENT</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered'>        

	    <tr><td width='200'>Department Karyawan <?php echo form_error('department_karyawan') ?></td><td><input type="text" class="form-control" name="department_karyawan" id="department_karyawan" placeholder="Department Karyawan" value="<?php echo $department_karyawan; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_department" value="<?php echo $id_department; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('department') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>