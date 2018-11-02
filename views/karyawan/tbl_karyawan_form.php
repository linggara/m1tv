<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA KARYAWAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered'>        

	    <tr><td width='200'>Nik Karyawan <?php echo form_error('nik_karyawan') ?></td><td><input type="text" class="form-control" name="nik_karyawan" id="nik_karyawan" placeholder="Nik Karyawan" value="<?php echo $nik_karyawan; ?>" /></td></tr>
	    <tr><td width='200'>Nama Lengkap <?php echo form_error('nama_lengkap') ?></td><td><input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" /></td></tr>
	    <tr><td width='200'>Jabatan <?php echo form_error('jabatan') ?></td><td><?php echo cmb_dinamis('jabatan', 'tbl_jabatan', 'jabatan_karyawan', 'id_jabatan',$jabatan) ?></td></tr>
	    <tr><td width='200'>Department <?php echo form_error('department') ?></td><td><?php echo cmb_dinamis('department', 'tbl_department', 'department_karyawan', 'id_department',$department) ?></td></tr>
	    <tr><td width='200'>Status <?php echo form_error('status') ?></td><td><?php echo cmb_dinamis('status', 'tbl_status_karyawan', 'status', 'status',$status) ?></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_karyawan" value="<?php echo $id_karyawan; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('karyawan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>