<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">FORM PEMINJAMAN</h3>
            </div>
            
            
<table class='table table-bordered'>        

	    <tr><td width='200'>No Form Peminjaman <?php echo form_error('no_form_peminjaman') ?></td><td colspan="2"><input type="text" class="form-control" name="no_form_peminjaman" id="no_form_peminjaman" placeholder="No Form Peminjaman" value="<?php echo $no_form_peminjaman; ?>" readonly /></td></tr>
	    <input type="hidden" class="form-control" name="id_form_barang" id="id_form_barang" placeholder="Id Form Barang" value="<?php echo $id_form_barang; ?>" />
	    <input type="hidden" class="form-control" name="user_peminjaman" id="user_peminjaman" placeholder="User Peminjaman" value="<?php echo $user_peminjaman; ?>" />
	    <tr><td width='200'>NIK <?php echo form_error('user_peminjaman') ?></td>
        <td width='200'><input type="text" onkeyup='nik()' class="form-control" name="user_cari" id="user_cari" placeholder="Nik" value="<?php echo $user_peminjaman; ?>" /></td>
        <td><input type="text" class="form-control" name="nama_cari" readonly id="nama_lenkap" placeholder="Nama Lengkap"  /></td>
        </tr>
		<tr><td width='200'>Nama Program <?php echo form_error('nama_program') ?></td><td colspan="2"><input type="text" class="form-control" name="nama_program" id="nama_program" placeholder="Nama Program" value="<?php echo $nama_program; ?>" /></td></tr>
	    <input type="hidden" class="form-control" name="tgl_peminjaman" id="tgl_peminjaman" placeholder="Tgl Peminjaman" value="<?php echo $tgl_peminjaman; ?>" />
	    <input type="hidden" class="form-control" name="tgl_pengembalian" id="tgl_pengembalian" placeholder="Tgl Pengembalian" value="<?php echo $tgl_pengembalian; ?>" />
	    <input type="hidden" class="form-control" name="status_peminjaman" id="status_peminjaman" placeholder="Status Peminjaman" value="<?php echo $status_peminjaman; ?>" />
	    <tr><td></td><td colspan="2"><input type="hidden" name="id_peminjaman" value="<?php echo $id_peminjaman; ?>" /> 
	    <button type="submit" class="btn btn-danger" onclick='savebarang()'><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
		<button type="submit" class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-calendar-check-o"></i> Add Barang</button> 
	    <button type="submit" class="btn btn-danger" onclick='clears()'><i class="fa fa-floppy-o"></i>Clear</button> </td></tr>
	</table>       
    
    </div>
	<div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">LIST BARANG YANG DI PINJAM</h3>
            </div>
			<div id='list_pinjaman'> 
            <table class='table table-bordered'>
        <tr><th>Barcode Detail</th><th>Nama Barang</th><th>S/N</th><th>Add</th></tr>
        <input type="hidden" class="form-control" name="addbarangs" id="addbarangs" value="<?php echo $jumlah?>" />
        <?php foreach ($db as $peminjaman)
            {
                echo "<tr><td>$peminjaman->barcode_barang_detail</td>
                <td>$peminjaman->uraian_barang</td>
                <td>$peminjaman->serial_number</td>
                <td>
                <button type='button' class='btn btn-danger'  onclick='deleteds($peminjaman->id_barang)' id='tombol'><i class='fa fa-floppy-o'></i> Delete</button>
                </td></tr>" ;
            }
                 ?>
        </table>
            </div>
</div>
<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Barang</h4>
      </div>
      <div class="modal-body">
	  <table class='table table-bordered'>        
      <tr><td width='200'>No Form Peminajam <?php echo form_error('no_form_peminajam') ?></td><td><input readonly type="text" class="form-control" name="no_form_peminajam" id="no_form_peminajam" placeholder="No Form Peminajam" value="<?php echo $no_form_peminjaman; ?>" /></td></tr>
<tr><td width='200'>Masukkan Barcode Barang <?php echo form_error('barcode_peminjaman') ?></td><td>
<input type="text" class="form-control" name="barcode_peminjaman" id="barcode_peminjaman" placeholder="Barcode Peminjaman" value="<?php echo $id_form_barang; ?>" onkeyup='addBarang()'/></td>
<td><button type="submit" onclick='addBarang()' class="btn btn-info"><i class="fa fa-eye"></i> Cari</button></td>
</tr>
</table>        </div>

<div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">DETAIL BARANG</h3>
            </div>
            <div id='list'> </div>

</div>

<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        
      </div>
	  </div>
      
    </div>
  </div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">

        function deleteds(id){
            var noPeminjaman = $("#no_form_peminjaman").val();
            $.ajax({
                url:"<?php echo base_url()?>index.php/peminjaman/delete_action",
                data:"id=" + id + "&no_form_barang="+ noPeminjaman ,
                success: function(html)
                { 
                   // alert('berhasil');
                    //$("#product").val(''),
                    //$("#list").html(html);
                    // $("#addbarang").val("addklik");
                    $("#list_pinjaman").html(html);
                    addBarang();
                }
            });
        }

        function nik() {
            if ($("#user_cari").val() == ''){
                var barcode = 'm'
            } else {
            var nik = $("#user_cari").val();
            
            }
          //  alert(noPeminjaman);
            $.ajax({
                url:"<?php echo base_url()?>index.php/peminjaman/nik_ajax",
                data:"nik=" + nik,
                success: function(data)
                { 
                    var json = data,
                    obj = JSON.parse(json);
                  //  alert('berhasil');
                    $("#nama_lenkap").val(obj.nama);
					$("#user_peminjaman").val(obj.id_karyawan);
                  
                }
            });
        }

		function savebarang(){
            if($("#nama_program").val() == ''){
                var namaProgram = 'NON-PROGRAM';
            } else {
                var namaProgram = $("#nama_program").val();
            }
            if($("#user_peminjaman").val() == ''){
                alert('Mohon Masukan NIK');
            } else if($("#nama_lenkap").val() == 'Not Found'){
                alert('Karyawan tidak terdaftar');
            } else if($("#addbarangs").val() == '0'){
                alert('Mohon Add Barang');
            } 
             else {
            var noPeminjaman = $("#no_form_peminjaman").val();
            var nik = $("#user_peminjaman").val();

            $.ajax({
                url:"<?php echo base_url()?>index.php/peminjaman/savebarang",
                data:"nik=" + nik + "&noPeminjaman="+ noPeminjaman +  "&nama_program="+ namaProgram,
                success: function(html)
                { 
                    // window.location.href = "<?php echo base_url()?>index.php/peminjaman/pdf/"+noPeminjaman;
                    window.open(
                        "<?php echo base_url()?>index.php/peminjaman/pdf/"+noPeminjaman,
                    '_blank' // <- This is what makes it open in a new window.
                    );
                    window.location.href = "<?php echo base_url()?>index.php/peminjaman";

                }
            });
            }

        }

        function addBarang() {
            if ($("#barcode_peminjaman").val() == ''){
                var barcode = 'mmm'
            } else {
            var barcode = $("#barcode_peminjaman").val();
            // var noPeminjaman = $("#no_form_peminajam").val(); 
            // alert(barcode);
            // alert(noPeminjaman);
            }
          //  alert(noPeminjaman);
            $.ajax({
                url:"<?php echo base_url()?>index.php/peminjaman/add_product_ajax",
                data:"barcode=" + barcode  ,
                success: function(html)
                { 

                    //alert('berhasil');
                    //$("#product").val(''),
                    $("#list").html(html);
                    //$("#list2").html(html);
                }
            });
        }

        function pinjam(noBarang){
            var noPeminjaman = $("#no_form_peminajam").val();
            //var tambahin = $("#tombol").val();
            //alert(noBarang+"<br>"+noPeminjaman);
            $.ajax({
                url:"<?php echo base_url()?>index.php/peminjaman/pinjam_action",
                data:"barcode=" + noBarang  + "&noPeminjaman="+ noPeminjaman,
                success: function(html)
                { 
                   // alert('berhasil');
                    //$("#product").val(''),
                    //$("#list").html(html);
                    $("#addbarang").val("addklik");
                    $("#list_pinjaman").html(html);
                    addBarang();
                }
            });
        }

        function clears(){
            var noPeminjaman = $("#no_form_peminajam").val();
            $.ajax({
                url:"<?php echo base_url()?>index.php/peminjaman/clears",
                data:"noPeminjaman="+ noPeminjaman,
                success: function(html)
                { 
                    window.location.href = "<?php echo base_url()?>index.php/peminjaman/create"
                }
            });
        }
</script>