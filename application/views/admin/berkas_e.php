<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		<h1 class="h2">Form Ubah Berkas</h1>

		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="<?php echo base_url(); ?>admin/berkas">
				<button class="btn btn-sm btn-outline-success">Kembali</button></a>

			</div>

		</div>     
		<?php
		echo validation_errors('<div class="alert alert-danger">', '</div>');
		echo form_open_multipart(site_url('admin/berkas/edit/'.$edit->id_berkas)) ?>
		<div class="row my-4">
			<div class="col-md-8">  
				<div class="card">  
					<div class="card-body">   
						<div class="form-group">
							<label>Nama berkas</label>
							<input type="text" class="form-control" value="<?php echo $edit->nama_berkas ?>" name="nama_berkas" readonly>
						</div>  
						<div class="form-group">
							<label>Berkas</label>
							<embed src="<?php echo base_url('dokumen/dok_user/'.$edit->file_berkas); ?>" type="application/pdf" width="100%" height="700"/>         							
							<p style="padding-left: 10px; margin-top: 10px;"><a href="<?php echo base_url('dokumen/dok_user/'.$edit->file_berkas); ?>"><i class="fa fa-download pr-2"></i>Download Berkas</a></p>   
						</div> 
					</div>
				</div>  
			</div>

			<div class="col-md-4">  
				<div class="card">
					<div class="card-body"> 
						<div class="form-group">
							<label>User</label>
							<input type="text" class="form-control" value="<?php echo $edit->nama_user ?>" name="nama_user" readonly>
						</div>
						<div class="form-group">
							<label>Biaya Berkas</label>
							<input type="text" class="form-control" value="<?php echo $edit->biaya_berkas ?>" name="biaya_berkas">
						</div>
						<div class="form-group">
							<label>Kode Pembayaran</label>
							<input type="text" class="form-control" value="<?php echo $edit->kode_pembayaran ?>" name="kode_pembayaran">
						</div>
						<div class="form-group">
							<label>Status Berkas</label>
							<select class="custom-select form-control " name="status_berkas">
								<option value="1" <?php if ($edit->status_berkas==1){echo "selected";} ?>>Diterima</option>
								<option value="0" <?php if ($edit->status_berkas==0){echo "selected";} ?>>Ditolak</option>
							</select>  
						</div>
						<button type="submit" class="btn btn-primary btn-sm">Submit</button>
					</div>  
				</div>  
			</div>
		</div>
		<?php echo form_close(); ?>
	</main>
