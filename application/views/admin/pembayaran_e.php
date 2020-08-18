<main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
		<h1 class="h2">Form Ubah Pembayaran</h1>

		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="<?php echo base_url(); ?>admin/pembayaran">
				<button class="btn btn-sm btn-outline-success">Kembali</button></a>

			</div>

		</div>     
		<?php
		echo validation_errors('<div class="alert alert-danger">', '</div>');
		echo form_open_multipart(site_url('admin/pembayaran/edit/'.$edit->id_pembayaran)) ?>
		<div class="row my-4">
			<div class="col-md-7">  
				<div class="card">  
					<div class="card-body">   
						<div class="form-group">
							<label>Bukti Pembayaran</label>
							<img src="<?php echo base_url().'img/img_pembayaran/'.$edit->bukti_pembayaran ?>" class="img-fluid" width="600px" >
							<input type="text" class="form-control" value="<?php echo $edit->bukti_pembayaran ?>" name="gambar_lama" hidden>
						</div>
					</div>
				</div>  
			</div>

			<div class="col-md-5">  
				<div class="card">
					<div class="card-body"> 
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" value="<?php echo $edit->nama_pembayaran ?>" name="nama_pembayaran" readonly>
						</div>
						<div class="form-group">
							<label>Berkas</label>
							<input type="text" class="form-control" value="<?php echo $edit->nama_berkas ?>" name="nama_berkas" readonly>
						</div>
						<div class="form-group">
							<label>Nominal</label>
							<input type="text" class="form-control" value="<?php echo $edit->nominal_pembayaran ?>" name="nominal_pembayaran" readonly>
						</div>
						<div class="form-group">
							<label>Tanggal Bayar</label>
							<input type="text" class="form-control" value="<?php echo $edit->tglbayar_pembayaran ?>" name="tglbayar_pembayaran" readonly>
						</div>
						<div class="form-group">
							<label>Status Pembayaran</label>
							<select class="custom-select form-control " name="status_pembayaran">
								<option value="1" <?php if ($edit->status_pembayaran==1){echo "selected";} ?>>Diterima</option>
								<option value="0" <?php if ($edit->status_pembayaran==0){echo "selected";} ?>>Ditolak</option>
							</select>  
						</div>
						<button type="submit" class="btn btn-primary btn-sm">Submit</button>
					</div>  
				</div>  
			</div>
		</div>
		<?php echo form_close(); ?>
	</main>
